<?php
namespace Home\Controller;
use Think\Controller;
class NotifyController extends Controller {
	private $wx;
	public function __construct(){
		$this->wx=new WX();
	} 


	public function index(){
		$xml=$GLOBALS["HTTP_RAW_POST_DATA"];
    	

	}

	public function inset(array $data){
		
	}
}