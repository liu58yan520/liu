<?php
namespace Home\Controller;
use Think\Controller;
class PlayerController extends Controller {

    public function index(){
    	if(!I('get.id')) exit("don't hu nao");
        if(!cookie('user')){
            $wx=new \Home\Common\WX_info();
            $user=$wx->getMoreInfo();
            cookie('user',$user);
        }

        $p=D('player');
        $fans=$p->getALLfans(I('get.id'));
        $user=$p->getPlayerInfo(I('get.id'));
        $this->assign('fans',$fans);
        $this->assign('user',$user);
        $this->display();
    }

    public function make_vote(){
        if(cookie('user')['look']==1){
            $p=D('player');
            echo $p->vote(I('get.id'));
        }else{
            echo 'look';
            return ;
        }
    }
}



