<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST' => array('home'),
	'DEFAULT_MODULE' =>'Home',
	'TMPL_TEMPLATE_SUFFIX'=>'.tpl' ,
	'URL_MODEL'=>'2',
	'URL_CASE_INSENSITIVE' =>true,
	'TMPL_PARSE_STRING'=>array(  //不需要{}
		__JS__ =>__ROOT__.'/Public/js', 
		__CSS__=>__ROOT__.'/Public/css', 
		__IMG__=>__ROOT__.'/Public/img', 
		),
    'TMPL_CACHE_ON'=>false,  //关闭缓存
    'SHOW_PAGE_TRACE' =>true,  //数据库调试
);