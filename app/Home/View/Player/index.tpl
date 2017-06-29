<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="full-screen" content="true">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
	<link rel="stylesheet" type="text/css" href="__CSS__/player.css">
</head>
<style type="text/css">
body{
	background: #000;
}
header{
	color: #fafafa;
	text-align: center;
}
header .info{
	
	font-size: 4.5vw;
}
header .player{
	width: 90%;
	border-radius: 5px;
	margin: 3vh auto;
}
header button{
	display: block;
	margin: 2vh auto;
	width: 30%;
	height: 6vh;
	border-radius: 10px;
	border:none;
	font-size: 3.7vw;
	background: #31CA3B;
}
header .rank{
	color: yellow;
}
#list{
	width: 92%;
	min-height: 30px;
	background: #333;
	margin: 2vh auto;
	
}
#list p{
	color: #f60;
	width: 100%;
	background: #484848;
	height: 6vh;
	line-height: 6vh;
	text-align: center;
}
#list li{
	padding: 1.5vw 0;
	height: 5vh;
	color: #c0c0c0;
	border-bottom: 1px solid #777;
}
#list li:last-child{
	border: none;
}
#list li .face{
	height: 100%;
	margin: 0 2vw 0 5vw;
	width: auto;
	display: inline-block;
	float: left;
	border-radius: 50%;
}
#list li span{
	line-height: 5vh;
}
#list li span b{
	color: #ccc;
}
</style>
<body>
<header>
	<img src="__IMG__/user/{$user.name}.jpg" class="player">
	<div class="info">
		<span class="name">{$user.name}</span>
		<span class="poll">总票数: <b>{$user.poll}</b></span>
	</div>	
		<p class="rank">当前排名 {$user.rank}</p>
		<button data-url='{:U(make_vote)}?id={$user.id}'>
			<svg class="icon" aria-hidden="true">
			    <use xlink:href="#icon-toupiao"></use>
			</svg>
		为他投票</button>
</header>	
<div id="list">
	<p>
	<svg class="icon" aria-hidden="true">
	    <use xlink:href="#icon-toupiao_pre"></use>
	</svg>
	以下小伙伴投过票
	<svg class="icon" aria-hidden="true">
	    <use xlink:href="#icon-toupiao_pre"></use>
	</svg>
	</p>
	<ul>
		<li> <img class="face" src="__IMG__/face/123.jpg"> <span><b>xx</b> :刚刚为他投票</span> </li>
		<li> <img class="face" src="__IMG__/face/123.jpg"> <span><b>xx</b> :刚刚为他投票</span> </li>
		<li> <img class="face" src="__IMG__/face/123.jpg"> <span><b>xx</b> :刚刚为他投票</span> </li>
		<li> <img class="face" src="__IMG__/face/123.jpg"> <span><b>xx</b> :刚刚为他投票</span> </li>
	</ul>
</div>
</body>
<script type="text/javascript" src='__JS__/iconfont.js'></script>
<script type="text/javascript" src='__JS__/zepto.js'></script>
<script type="text/javascript">
$('header button').tap(function(){
	var click_player=false;
	if(click_player) {
			alert('请等待24小时候再给他投');
			return false;
		}
	$.get($(this).attr('data-url'),function(data){
		console.log(data)
		if(data==1){
			$('.poll b').text(Number($('.poll b').text())+1);
			click_player=true;
		}else if(data=='last'){
			alert('请等待24小时候再给他投');
			return false;
		}

	})
});

</script>
</html>