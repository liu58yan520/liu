<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST' => array('home'),
	'DEFAULT_MODULE' =>'Home',
	'TMPL_TEMPLATE_SUFFIX'=>'.tpl' ,
	'URL_MODEL'=>'2',
	'URL_CASE_INSENSITIVE' =>true,
	'TMPL_PARSE_STRING'=>array(  //不需要{}
		__JS__ =>__ROOT__.'/public/js', 
		__CSS__=>__ROOT__.'/public/css', 
		__IMG__=>__ROOT__.'/public/img', 
		),
);