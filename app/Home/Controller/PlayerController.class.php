<?php
namespace Home\Controller;
use Think\Controller;
class PlayerController extends Controller {
    public function index(){
        $this->display();
    }
    public function player_list(){
    	$this->display();
    }
    public function test(){
	    $u=D('User');
	   echo  $u->testM();
    }


}