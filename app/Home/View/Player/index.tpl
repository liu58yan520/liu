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

	</header>
<div id="title">
	<div class='tit'>
		<span class="name">{$player.name}</span>
		<span class="date">{$player.createAT}</span>
		<span class="Surplus">剩余5天</span>
		<p class="title">标题xxx</p>
	</div>
	<div class="info">
		<div>
			<p>总费用</p>
			<p class='strong'>1200元</p>
		</div>
		<div>
			<p>参与人数</p>
			<p class='strong'>500人</p>
		</div>
		<div>
			<p>已筹集</p>
			<p class='strong'>{$player.count_pay}元</p>
		</div>
	</div>	
	
</div>
<nav id='nav'>
	<button>活动介绍</button>
	<button>参与列表</button>
	<button>我的展示</button>
</nav>


<div id="main">


</div>

<div id="dialog">
<img class='pic' data="__IMG__/108/{$player.name}.jpg">
	<div class="text">
		<p class='con'>{$player.name}</p>
		<p class='con'>还剩528元</p>
	</div>
	<div class="pay_num">
		<button>+ </button>
		<input type="number" class='pay_num_text' value='5'>
		<button> -</button>
	</div>
	<biv class="btn">
		<button class='pay_start' >付款</button>
		<button class='close'>关闭页面</button>
	</biv>
</div>


<footer>
<button id='pay'>帮他筹款</button>
</footer>
<script type="text/javascript" src='__JS__/zepto.js'></script>
<!-- <script type="text/javascript" src='https://code.jquery.com/jquery-2.2.4.js'></script> -->
<script type="text/javascript" src='__JS__/player.js'></script>
</body>
</html>