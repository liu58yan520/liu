<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class IndexController extends Controller {

    public function index(){
    	$this->assign('count_pay',C('COUNT_PAY'));
        $this->display();
    }
    public function rec(){
        $this->display();
    }
    public function create(){
    	
    }
}



