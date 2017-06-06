<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class PlayerController extends Controller {
	private $wx;
	private $player;
	public 	$user;
	public function __construct(){
		parent::__construct();
		$this->wx=new \Home\Common\WX(); 
		$this->GetNowUserInfo();   //获取用户信息

	}
	private function GetNowUserInfo(){
		if(!isset($_COOKIE['user'])){
			$info=$this->wx->getInfo();
			$user=array("name"=>$info['nickname'],"face"=>rtrim($info['headimgurl'],'0').'64','openid'=>$info['openid']);
			setcookie("user['name']",$user['name']);
			setcookie("user['face']",$user['face']);
			setcookie("user['openid']",$user['openid']);
			$this->user=$user;
		}else
			return $user;
		
	}
	private function getPlayer(){
		$u=D('player');
		$requ=['id'=>I('get.id')];
		$this->player=$u->getPlayer($requ);
	}
    public function index(){
    	$this->getPlayer();
    	$this->assign('player',$this->player);
        $this->display();
    }
    public function player_list(){	
    	$fans=$this->getfans();
    	$this->assign('fans',$fans);
    	$this->display();
    }
    private function getfans(){
    	$u=D('fans');
    	$fans=$u->getMyALLFans(I('get.id'));
    	return $fans;
    }
    
    public function pay_start(){
    	$num=I('post.num');
    	if(!is_numeric($num)||$num>500||$num<1)
    		echo 'false';

    }
    public function pay(){
    	$this->display();
    }
    public function send(){
    	if(empty($this->user))
    		$user=$this->GetNowUserInfo();
    	$post=I('post.');
    	$data=array_merge($post,$user);
    	// $u=D('fans');
    	// $back=$u->inset($data);
    	dump($user);
    }
}