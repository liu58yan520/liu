<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $this->display();

    }
    public function home(){
        $this->assign('case',   M('case')->select());
        $this->assign('pro',    M('pro')->select());
        $this->assign('worker', M('worker')->select());
        $this->display();
    }
    public function about(){
    	$this->display();
    }
    public function exp($attr){
        $this->display('./Item/case');
    }


}



