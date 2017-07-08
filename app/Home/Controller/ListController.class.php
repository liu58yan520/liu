<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
    public function index(){
    	$i=I('get.attr');
    	$m=M($i);
    	$data=$m->select();
    	foreach ($data as $k => $v) {
    		$data[$k]['img']=$i.'/'.$data[$k]['id'].'.jpg';
    	}
    	$this->assign('data',$data);
        $this->display();
    }
  


   
}



