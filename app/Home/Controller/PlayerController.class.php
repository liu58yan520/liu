<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class PlayerController extends Controller {
	private $wx;
	private $player;
	private $user_info;

	public function __construct(){
		parent::__construct();
		$this->wx=new \Home\Common\WX(); 
		//$this->GetNowUserInfo();   //获取用户信息
	}
	private function GetNowUserInfo(){
		if(isset($_COOKIE['user'])){
		$user_info=$this->wx->getInfo();
		$info=array(
			'name'=>$user_info['nickname'],
			'face'=>rtrim($user_info['headimgurl'],'0').'64',
			'openid'=>$user_info['openid'],
			);
		setcookie('user',$info,7200+time());
		}
	}
	private function getPlayer(){
		$u=D('player');
		$requ=['id'=>I('get.id')];
		$a=$this->player=$u->getPlayer($requ);
		
	}
    public function index(){
    	$this->getPlayer();
    	$this->assign('player',$this->player);
        $this->display();
    }
    public function player_list(){
    	$this->display();
    }
    public function test(){
    	$u=D('fans');
    	$User=$u->relation(true)->find(1);
    	print_r($User);
    }
    



}