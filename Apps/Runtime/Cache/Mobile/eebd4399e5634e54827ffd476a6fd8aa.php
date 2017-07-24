<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta name="full-screen" content="true">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <link rel="stylesheet" type="text/css" href="__CSS__/swiper.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/common.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/index.css">
    <title>嘎嘎嘎</title>
</head>
<body>
<div id='banner' class="swiper-container">
    <div class="swiper-wrapper">
        <?php $__FOR_START_24126__=1;$__FOR_END_24126__=18;for($i=$__FOR_START_24126__;$i < $__FOR_END_24126__;$i+=1){ ?><div class="swiper-slide"><img src="__IMG__/bg/<?php echo ($i); ?>.jpg"></div><?php } ?>
    </div>
</div>
<div id="bg">
    <div id="top_menu"><img src="__IMG__/top_menu.png"><img class="logo" url='__P_IMG__' src="__P_IMG__/logo_h1.png"></div>
<div id="top_menu_list">
    <div class="close"><img src="__IMG__/X.png"></div>
    <div id="logo"><img src="__P_IMG__/logo_tou.png"></div>
    <ul>
        <?php
 $_typeid = 1; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = M('Nav')->where("navtype='".$_typeid."'")->order('sort')->select(); import('Class.Category', APP_PATH); if($_typeid == 0) { $_navlist = Category::unlimitedForLayer($_navlist); }else { $_navlist = Category::unlimitedForLayer($_navlist, 'child', 0); } foreach($_navlist as $autoindex => $navlist): if(strstr($navlist['url'], '@')){ $cdata = M('category')->find(str_replace('@', '', $navlist['url'])); $navlist['url'] = getUrl($cdata); }else{ $navlist['url'] = $navlist['url']; } ?><li>
		   <a href='/Mobile/Index/<?php echo ($navlist["url"]); ?>'><?php echo ($navlist["name"]); ?></a>
		  </li><?php endforeach;?>
        <li>筑圆润 | 国际精品家装<img src="__IMG__/huanguan.png"></li>
    </ul>
</div>
    <div id="center">
        <p class="tit">筑圆润 | 国际精品</p>
        <p><span>&nbsp;&nbsp;Zhu Yuan Run</span>&nbsp;&nbsp;&nbsp;<em> International Boutique</em> </p>
    </div>
</div>
</body>
<script type="text/javascript" src="__JS__/jquery.min.js"></script>
<script type="text/javascript" src='__JS__/jquery.swiper.js'></script>
<script type="text/javascript" src='__JS__/base.js'></script>
<script type="text/javascript" src='__JS__/index.js'></script>
</html>