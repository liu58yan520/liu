<?php
class IndexAction extends CommonAction{
	public function index(){
		$this->title = C('cfg_webname');
		$this->sitetitle = str_replace('[dq]', '', C('cfg_webtitle'));
		$this->display($this->tpl_file);
	}

	public function team(){  //梦之队
		$this->display($this->tpl_file);
	}

	public function about(){
		$this->display($this->tpl_file);
	}
	public function call(){
		$this->display($this->tpl_file);
	}
	public function cases(){
		$this->display($this->tpl_file);
	}
}

?>