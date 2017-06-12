<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class IndexController extends Controller {

    public function index(){
        $wx=new \Home\Common\WX();
        $user=$wx->getWXuser();
        $sign=$wx->GetSignPackage();
        $m=M('player');
        $id=$m->field('id')->where(array('openid'=>$user['openid']))->find();
        $id=empty($id['id'])?0:$id['id'];
        $this->assign('id',$id);
        $this->assign('sign',$sign);
    	$this->assign('count_pay',C('COUNT_PAY'));
        $this->display();
    }
    public function rec(){
        $this->display();
    }
    public function create(){
    	$p=D('player');
        $user=I('post.');
        $user['name']=  cookie('user')['name'];
        $user['openid']=cookie('user')['openid'];
        $user['createAT']=date("Y-m-d");
        $m=M('player');
        $id=$m->add($user);
        $this->redirect('Player/index/id/'.$id);
    }
    


}



