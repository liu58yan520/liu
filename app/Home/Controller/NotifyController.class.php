<?php
namespace Home\Controller;
use Think\Controller;
class NotifyController extends Controller {

	public function index(){
		$xml=$GLOBALS["HTTP_RAW_POST_DATA"];
    	file_put_contents('log.log',$xml,FILE_APPEND);
	}

	public function inset(){

	}
}