<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="full-screen" content="true">
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
		<span class="date">{$player.createat}</span>
		<span class="Surplus">剩余5天</span>
		<p class="title">标题xxx</p>
	</div>
	<div id="row">
		<div class="baifen">30%</div>
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
	<button url="{:U('Player/fans_list')}">参与列表</button>
</nav>


<div id="main"></div>

<div id="dialog">
<div class="dialog_bg"></div>
	<div class="money_num item">88</div>
	<div class="money_num item">66</div>
	<div class="money_num item">33</div>
	<div class="other item">其他</div>
	<label>请输入赞助金额 <input type="number" name="pay_num"></label>
	<biv class="btn">
		<button class='pay_start' url="{:U('Player/beforePay')}" >付款</button>
		<button class='close'>关闭页面</button>
	</biv>
</div>

<i class='none' id='id'>{$player.id}</i>
<footer>
<button id='pay'>帮他筹款</button><button data="{:U('Index/index')}" >我也要筹</button>
</footer>
<script type="text/javascript" src='__JS__/zepto.js'></script>
<script type="text/javascript" src='__JS__/player.js'></script>
<script type="text/javascript" src='__JS__/pay.js'></script>
</body>
</html>