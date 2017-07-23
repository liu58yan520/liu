<?php
class IndexAction extends CommonAction{  //	PC页面
	public function index(){
		if(C('cfg_is_guide') == 1) {
			$guuide_tpl = '.'.C('TMPL_PATH').MODULE_NAME.'_default.html';
			$this->display($guuide_tpl);
			exit();
		}
		goMobile();
		$this->display($this->tpl_file);
	}
	public function home(){
		$this->display($this->tpl_file);
	}
	

}
?>