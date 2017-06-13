<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class PlayerController extends Controller {
    public function __construct(){
        parent::__construct();
        $user=cookie('user');
        if(empty($user)){
            $wx=new \Home\Common\WX();
            $wx->getWXuser();
        }
        $this->downFace();
    }

    public function index(){
        $wx=new \Home\Common\WX();
        $sdk=$wx->GetSignPackage();
        $sdk['link']= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']; 
        $sdk['img']='http://'.$_SERVER['HTTP_HOST'].str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])).'/Public/img/top.jpg';
        $sdk['title']=cookie('user')['name'].'的众筹';
        $this->assign('sdk',$sdk);
        $player=$this->setVAR();
        if(empty($player['id']))
            exit('Not find');
        $this->assign('player',$player);
        $this->display();
    }
    private function setVAR(){
        $id=I('get.id');
        if(empty($id)||!is_numeric($id)) exit('Error');
        $player=$this->getPlayer();
        $fans=$this->getfansCount($id);
        //总筹集数
        $player['count_pay']=empty($fans['sum'])?0:$fans['sum'];
        //给他投票的人数
        $player['count_ren']=empty($fans['count'])?0:$fans['count'];
        //总共要筹多少钱
        $player['ALL_count_pay']=C('COUNT_PAY');
        //筹款百分比
        $player['tar_width']=($player['count_pay']/$player['ALL_count_pay'])*100;
        
        return $player;
    }
	
	private function getPlayer(){
		$u=M('player');
        $player=$u->where('id='.I('get.id'))->field('*')->find();
        return $player;
	}
    public function rep_inset(){
        $post=array(
            'text'=>I('post.text'),
            'rid'=>I('post.rid'),
            'openid'=>cookie('user')['openid']
            );
        $m=M('reply');
        $m->add($post);
        echo $post['openid'];
    }

    private function getfansCount($qid){
        $p=M('fans');
        $count=$p->where('qid='.$qid )->count();
        $sum=$p->where('qid='.$qid)->Sum('pay');
        return array('count'=>$count,'sum'=>$sum);
    }
    public function fans_list(){	
    	$fans=$this->getfans(I('get.id'));
    	$this->assign('fans',$fans);
    	$this->display();
    }
    public function getfans($id){ //获取所有捐款人 和回复
        $u=D('fans');
        $fans=$u->relation(true)->where('qid='.$id)->select();
    	return $fans;
    }
    public function beforePay(){
        $wx=new \Home\Common\WX();
        $info="商品简介";
        $attach="name=".cookie('user')['name']."&qid=".I('post.qid');
        $num=I('post.pay');
        //$url=dirname(dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"])).'/Notify/index';
        $url=dirname(dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"])).'/Notify/U2FsdGVkX1';
        $wx->befoepay($info,$attach,$num*100,$url,cookie('user')['openid']);
        $back=$wx->pay();
        echo json_encode($back);
    }

    private function downFace(){  
        $face=cookie('user')['face'];
        $openid=cookie('user')['openid'];
    	$path=$_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/img/face/'.$openid.'.jpg';
        if(file_exists($path)||empty($face))
            return '无头像或已存在';
	    $ch=curl_init(); 
        curl_setopt($ch,CURLOPT_URL,$face); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5); 
        $img=curl_exec($ch); 
        curl_close($ch); 
        echo file_put_contents($path,$img);	
    }

}