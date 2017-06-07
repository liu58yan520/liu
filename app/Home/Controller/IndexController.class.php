<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class IndexController extends Controller {

   public $test;
    protected function CheckPlayer($name){
        $requ=array('name'=>$name);
        $field=array('id','createAT','count_pay');
        $u=D('player');
        return $u->getPlayer($requ,$field);
    }
    public function index(){
        $this->display();
    }

    public function select(){
    	$name=I('get.name');
    	if(empty($name)&&$name=='undefined') 
    		echo false;
    	else
            echo json_encode($this->CheckPlayer($name));
    }

    public function createPlayer(){
        $id=I('get.id');
        $u=D('player');
        if(!empty($id))
        $u->createPlayer($id); 
    }
}



