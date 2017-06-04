<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="full-screen" content="true">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="360-fullscreen" content="true">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/collect/public/css/common.css">
	<link rel="stylesheet" type="text/css" href="/collect/public/css/index.css">
</head>
<script type="text/javascript">
  	// var APP 		= "/collect";
   //  var MODULE 		= "/collect/Home";
   //  var CONTROLLER 	= "/collect/Home/Index";
   //  var ACTION 		= "/collect/Home/Index/Index";
    var IMG         ="/collect/public/img";     
</script>
<body>
	<div id="bg"> <img src="/collect/public/img/bg.jpg"> </div>
	<div id="main">
		<p class='tishi'>此次优惠活动仅仅针对 《中国新歌声》江苏赛区108位唱将</p>
		<div class="input">
			<div class="input_bg"></div>
			<input type="text"  placeholder="姓名">
		</div>
		<button id='select'>查找</button>
	</div>
<div id="dialog">
<img class='pic' src="/collect/public/img/108/陈东.jpg">
	<div class="text">
		<p class='con'>刘炎</p>
		<p class='con'>未创建活动</p>
	</div>
	<biv class="btn">
		<button class='create' href="{U(Player/index?id=)}" >创建活动</button>
		<button class='close'>关闭页面</button>
	</biv>
</div>
<script type="text/javascript" src='/collect/public/js/zepto.js'></script>
<script type="text/javascript" src='/collect/public/js/index.js'></script>
</body>
</html>