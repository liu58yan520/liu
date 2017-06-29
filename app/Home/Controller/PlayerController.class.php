<?php
namespace Home\Controller;
use Think\Controller;
class PlayerController extends Controller {
    public function index(){
    	if(!I('get.id')) exit("don't hu nao");
        $p=D('player');
        $user=$p->getPlayerInfo(I('id'));
        $this->assign('user',$user);
        $this->display();
    }

    public function make_vote(){
    	$p=D('player');
        $a= $p->vote(I('get.id'));
        var_dump($a);
    }

    public function downFace(){  
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



