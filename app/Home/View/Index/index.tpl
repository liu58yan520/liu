<!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
	<link rel="stylesheet" type="text/css" href="__CSS__/index.css">
</head>
<script type="text/javascript">
  	// var APP 		= "__APP__";
   //  var MODULE 		= "__MODULE__";
   //  var CONTROLLER 	= "__CONTROLLER__";
   //  var ACTION 		= "__ACTION__";
    var IMG         ="__IMG__";     
</script>
<body>
	<div id="bg"> <img src="__IMG__/bg.jpg"> </div>
	<div id="main">
		<p class='tishi'>此次优惠活动仅仅针对 《中国新歌声》江苏赛区108位唱将</p>
		<div class="input">
			<div class="input_bg"></div>
			<input type="text"  placeholder="姓名">
		</div>
		<button id='select'>查找</button>
	</div>
<div id="dialog">
<img class='pic' src="__IMG__/108/陈东.jpg">
	<div class="text">
		<p class='con'>刘炎</p>
		<p class='con'>未创建活动</p>
	</div>
	<biv class="btn">
		<button class='create' href="{:U('Player/index')}" >创建活动</button>
		<button class='close'>关闭页面</button>
	</biv>
</div>
<script type="text/javascript" src='__JS__/zepto.js'></script>
<script type="text/javascript" src='__JS__/index.js'></script>
</body>
</html>