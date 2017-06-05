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
	<link rel="stylesheet" type="text/css" href="/web/collect/Public/css/common.css">
	<link rel="stylesheet" type="text/css" href="/web/collect/Public/css/index.css">
</head>
<script type="text/javascript">
  	// var APP 		= "/web/collect";
   //  var MODULE 		= "/web/collect/Home";
   //  var CONTROLLER 	= "/web/collect/Home/Index";
   //  var ACTION 		= "/web/collect/Home/Index/index";
    var IMG         ="/web/collect/Public/img";     
</script>
<body>
	<div id="bg"> <img src="/web/collect/Public/img/bg.jpg"> </div>
	<div id="main">
		<p class='tishi'>此次优惠活动仅仅针对 《中国新歌声》江苏赛区108位唱将</p>
		<div class="input">
			<div class="input_bg"></div>
			<input type="text"  placeholder="姓名">
		</div>
		<button id='select'>查找</button>
	</div>
<div id="dialog">
<img class='pic' src="/web/collect/Public/img/108/陈东.jpg">
	<div class="text">
		<p class='con'>刘炎</p>
		<p class='con'>未创建活动</p>
	</div>
	<biv class="btn">
		<button class='create' href="<?php echo U('Player/index');?>" >创建活动</button>
		<button class='close'>关闭页面</button>
	</biv>
</div>
<script type="text/javascript" src='/web/collect/Public/js/zepto.js'></script>
<script type="text/javascript" src='/web/collect/Public/js/index.js'></script>
</body>
</html>