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
	<link rel="stylesheet" type="text/css" href="__CSS__/player.css">
</head>
<body>
	<header>
		<img src="__IMG__/top.jpg">
	</header>
<div id="title">
	<div class='tit'>
		<span class="name">{$player.name}</span>
		<span class="date">{$player.createAT}</span>
		<span class="Surplus">剩余5天</span>
		<p class="title">标题xxx</p>
	</div>
	<div id="row">
		<div class="bg_red" tar_width="{$player.tar_width}"></div>
	</div>
	<div class="info">
		<div>
			<p>总费用</p>
			<p class='strong'>{$player.ALL_count_pay}元</p>
		</div>
		<div>
			<p>参与人数</p>
			<p class='strong'>{$player.count_ren}人</p>
		</div>
		<div>
			<p>已筹集</p>
			<p class='strong'>{$player.count_pay}元</p>
		</div>
	</div>	
	
</div>
<nav id='nav'>
	<button>活动介绍</button>
	<button tar_url="{$player.tar_list_url}">参与列表</button>
</nav>


<div id="main">


</div>

<div id="dialog">
<div class="dialog_bg"></div>
	<div class="money_num">88</div>
	<div class="money_num">66</div>
	<div class="money_num">33</div>
	<label>请输入金额 <input type="number" name="pay_num"></label>
	<biv class="btn">
		<button class='pay_start' data="{$player.pay_url}" >付款</button>
		<button class='close'>关闭页面</button>
	</biv>
</div>

<i class="none" id='i'>{$player.id}</i>
<footer>
<button id='pay'>帮他筹款</button>
</footer>
<script type="text/javascript" src='__JS__/zepto.js'></script>
<script type="text/javascript" src='__JS__/player.js'></script>
</body>
</html>