<?php
namespace Home\Controller;
use Think\Controller;
class ReplyController extends Controller {
	private $rid;
	public function __construct(){
		parent::__construct();
		$this->rid=I('post.rid');
	} 



}