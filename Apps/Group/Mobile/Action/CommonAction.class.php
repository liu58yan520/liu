<?php
class CommonAction extends Action {
	public function _initialize() {
		$this->mobile_css = C('cfg_mobile_pcolor') != "" ? "style_".C('cfg_mobile_pcolor') : "style";
		$this->tpl_file = '.'.C('TMPL_PATH').MODULE_NAME.'_'.ACTION_NAME.'.html';
		$this->inc_top_menu = '.'.C('TMPL_PATH').'/inc/inc_top_menu.html';
        $this->inc_footer= '.'.C('TMPL_PATH').'/inc/inc_footer.html';
        $this->inc_about_info= '.'.C('TMPL_PATH').'/inc/inc_about_info.html';
        $this->inc_title= '.'.C('TMPL_PATH').'/inc/inc_title.html';
        $this->inc_pic_text= '.'.C('TMPL_PATH').'/inc/inc_pic_text.html';
        $this->inc_dialog= '.'.C('TMPL_PATH').'/inc/inc_dialog.html';
		// $this->tpl_Public_header = '.'.C('TMPL_PATH').'Public_header.html';
		// $this->tpl_Public_footer = '.'.C('TMPL_PATH').'Public_footer.html';

	}

}
?>