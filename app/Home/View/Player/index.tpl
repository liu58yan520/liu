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
		<if condition="$fans eq null ">
			快来召唤小伙伴投票吧 
		<else />
			以下小伙伴投过票
		</if>
	<svg class="icon" aria-hidden="true">
	    <use xlink:href="#icon-toupiao_pre"></use>
	</svg>
	</p>
	<ul>
		<if condition="$fans NEQ null">
			<volist name='fans' id='fans'> 
				<li> <img class="face" src="{$fans.face}"> <span><b>{$fans.name}</b> :刚刚为他投票</span> </li>
			</volist>
		</if>
	</ul>
</div>

	<div id="show_logo" class="none" >
	<p>长按图片 点击识别二维码关注后投票 
			<svg class="icon" aria-hidden="true">
			    <use xlink:href="#icon-guanbi"></use>
			</svg>
	</p>
	<img src="__IMG__/ewm.jpg">
	</div>
</body>
<script type="text/javascript" src='http://at.alicdn.com/t/font_g9k7y7cpax94fgvi.js'></script>
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
			var dd=$('<li> <img class="face" src="'+unescape(getCookie('user','face'))+'"> <span><b>'+decodeURIComponent(getCookie('user','name'))+'</b> :刚刚为他投票</span> </li>')
			$('#list ul').prepend(dd);

		}else if(data=='last'){
			alert('请等待24小时候再给他投');
			return false;
		}else if(data=='look'){
			start_logo();
		}

	})
});

function start_logo(){
	$('#show_logo').show().siblings().css({opacity:0.2});
}
$('#show_logo p .icon').tap(function(){
	$('#show_logo').hide().siblings().css({opacity:1});
})
function getCookie(name,f){
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	var j;
	if(arr=document.cookie.match(reg)){
		 j= unescape(arr[2])
		 j=j.substring(6,j.length);
		 j= JSON.parse(j);
		 return j[f];
	}
}

</script>
</html>