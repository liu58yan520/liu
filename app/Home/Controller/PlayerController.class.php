<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class PlayerController extends Controller {
	private $wx;
	function __construct(){
		header("Content-Type:text/html;charset=utf-8"); 
		parent::__construct();
		$this->wx=new \Home\Common\WX(); 

	}
    public function index(){
        $player=$this->getPlayer();
        $fans=$this->GetNowUserInfo();   //获取用户信息
        $this->downFace($fans['face'],$fans['openid']); //下载头像
        $pay_url=$this->pay_url($player,$fans);
        $player['pay_url']=$pay_url;
        dump($player);
        dump($fans);
        $this->assign('player',$player);
        $this->display();
    }
	private function GetNowUserInfo(){
		// if(!isset($_COOKIE['user'])){
		// 	$info=$this->wx->getInfo();
  //           $user=array(
  //               "name"=>$info['nickname'],
  //               "face"=>rtrim(trim($info['headimgurl']),'0').'64',
  //               'openid'=>$info['openid']);
		// 	setcookie("user[name]",$user['name']);
		// 	setcookie("user[face]",$user['face']);
		// 	setcookie("user[openid]",$user['openid']);
		// 	return $user;
		// }else
		// 	return $_COOKIE['user'];
		$info=$this->wx->getInfo();
            $user=array(
                "name"=>$info['nickname'],
                "face"=>rtrim(trim($info['headimgurl']),'0').'64',
                'openid'=>$info['openid']);
            return $user;
	}
	private function getPlayer(){
		$u=D('player');
		$requ=['id'=>I('get.id')];
        return $u->getPlayer($requ);
	}
    private function pay_url($player,$fans){
        $info['player_name']=$player['name'];
        $info['fans_name']=$fans['name'];
        $info['openid']=$fans['openid'];
        $info['qid']=$player['id'];
        return urldecode(http_build_query($info)).'&num=';    
    }

    public function fans_list(){	
    	$fans=$this->getfans();
    	$this->assign('fans',$fans);
    	$this->display();
    }
    private function getfans(){
    	$u=D('fans');
    	$fans=$u->getMyALLFans(I('get.id'));
    	return $fans;
    }
    
    public function pay(){
        $this->assign('info',I('get.'));
        $this->display();
    }
    public function send(){
    	$post=I('post.');
        $pay=$post['pay'];
        $player_name=$post['player_name'];
        unset($post['pay']);
        unset($post['player_name']);
    	$attr=urldecode($this->arrayTOstring($post));
 		$url=dirname(dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"])).'/Notify/index';
 		$a=$this->wx->befoepay('新歌声108将众筹--'.$player_name,$attr,$data['num']*100,$url,$post['openid']);
        dump($a);
    }
    private function arrayTOstring(array $arr){
    	$str='';
    	foreach ($arr as $k => $v) 
    		$str.=$k.'='.$v.'#!#';
    	return rtrim($str,'#!#');
    }

    public function downFace($face,$openid){            
    	$path=$_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/img/face/'.$openid.'.jpg';
        if(file_exists($path)||empty($face))
            return '无头像或已存在';
	    $ch=curl_init(); 
        curl_setopt($ch,CURLOPT_URL,$face); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5); 
        $img=curl_exec($ch); 
        curl_close($ch); 
        file_put_contents($path,$img);	
    }

}