<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="full-screen" content="true">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
	<link rel="stylesheet" type="text/css" href="__CSS__/index.css">
</head>
<body>

	<header>
		<div id="top">
			<img src="__IMG__/top.jpg">
		</div>
		<p class="title">
			标题xxx
			<span class='money'>￥{$count_pay}</span>
		</p>
	</header>
	<div id="main">
		<p class="title">正标题</p>
		<p class="sub_title">副标题</p>
		<div id="content">
			内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容
内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
		</div>	
		<div class="more">查看更多</div>
	</div>	

	<footer>
	<if condition="$id EQ 0"> 
	   <button id='submit' url="{:U('Index/rec')}" >我要众筹</button>
	<else />
	   <button id='submit' url={:U('Player/index',array('id'=>$id))} >我的活动</button>
	</if>
	</footer>


<script type="text/javascript" src='__JS__/zepto.js'></script>
<script type="text/javascript" src='__JS__/index.js'></script>
</body>
</html>