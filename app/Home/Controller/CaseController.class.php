<?php
namespace Home\Controller;
use Think\Controller;
class CaseController extends Controller {
    public function index(){
    	$data=$this->date_test();
    	$this->assing('data',$data);
        $this->display();
    }
   
    public function date_test(){
    	return array(
    	array( 'id'=>1,'name'=>'刘总的豪宅','img'=>'aa','date'=>'2017年7月6日 22:45:03','look'=>'0'),
    	array( 'id'=>1,'name'=>'王总的xx宅','img'=>'aa','date'=>'2017年7月6日 22:45:03','look'=>'0'),
    	array( 'id'=>1,'name'=>'刘xxx宅','img'=>'aa','date'=>'2017年7月6日 22:45:03','look'=>'0'),
    		);
    }
}



