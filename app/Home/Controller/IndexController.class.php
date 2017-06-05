<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class IndexController extends Controller {

    protected $PLAYER=array('刘炎','刘德华','大尺佑香','123','陈超');
    protected function CheckPlayer($name){
        //$id=array_search($name,$this->PLAYER);
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



