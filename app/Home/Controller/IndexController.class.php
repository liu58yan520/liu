<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function index_item(){
    	$this->assign('user',$this->getPlayer());
    	$this->display();
    }
    public function getPlayer(){
    	$p=D('player');
    	return $user=$p->getPlayer();
    }
    public function getPlayerOne(){
        $p=D('player');
        $name=I('post.name');
        $user=$p->getPlayerOne($name);
        $this->ajaxReturn($user);
    }
    public function rank_item(){
        $g=D('player');
        $user=$g->getRank();
        $this->assign('user',$user);
        $this->display();
    }


}



