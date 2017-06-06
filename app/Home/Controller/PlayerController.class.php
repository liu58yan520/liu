<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class PlayerController extends Controller {
	private $wx;
	private $player;
	public function __construct(){
		header("Content-Type:text/html;charset=utf-8"); 
		parent::__construct();
		$this->wx=new \Home\Common\WX(); 
	//	$this->GetNowUserInfo();   //获取用户信息

	}
	private function GetNowUserInfo(){
		if(!isset($_COOKIE['user'])){
			$info=$this->wx->getInfo();
			$user=array("name"=>$info['nickname'],"face"=>rtrim($info['headimgurl'],'0').'64','openid'=>$info['openid']);
			setcookie("user[name]",$user['name'],7200+time());
			setcookie("user[face]",$user['face'],7200+time());
			setcookie("user[openid]",$user['openid'],7200+time());
			return $user;
		}else
			return $_COOKIE['user'];
		
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
    	$data=array_merge($user,$post);
    	// if(count($data)<4)
    	// 	$this->error('付款提交有误，请返回重新操作',3);
    	dump($data);
    	$attr=urldecode($this->arrayTOstring($data));
 		$url=dirname(dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"])).'/Notify/index';
 		$a=$this->wx->befoepay('新歌声108将众筹',$attr,$data['num']*100,$url);
 		dump($a);
    }
    private function arrayTOstring(array $arr){
    	$str='';
    	foreach ($arr as $k => $v) 
    		$str.=$k.'='.$v.'###';
    	return rtrim($str,'###');
    }
    public function downFace(){
    	$url="http://wx.qlogo.cn/mmopen/Q3auHgzwzM40l6HHibbX5ict9mOMI9gW8YBACYXVjh6Eia7kriaja6aoM3NvBZvcryJROfHo1zEuYYhBiapiamRZCGkw/64";
    	$path=$_SERVER['DOCUMENT_ROOT'].__ROOT__.'/Public/img/face/a.jpg';
 	// 	$con = file_get_contents($url);
		// echo file_put_contents($path,$con);
			$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 0); 
	curl_setopt($ch,CURLOPT_URL,$url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$file_content = curl_exec($ch);
	curl_close($ch);

	file_put_contents($path,$downloaded_file);
		
    }

}