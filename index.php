<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Document</title>
</head>
<body>
<header>
	<img src="img/top.jpg">
	<div class="title"> 标题 <span class="r">xxx</span>  </div>
</header>
<div id="main">
	<div class="kan">
		<img src="img/kan.png" class="kan_img">
		<div class="now_num">123￥</div>
		<div class="past_num">50￥</div>
	</div>
	<div class="btn">
		<button class='kan_btn'>帮他kan</button>
	</div>
</div>
<img src="img/last.png">
<div id="menu">
	<ul>
		<li>活动说明</li>
		<li>帮砍团</li>
		<li>排行榜</li>
	</ul>
	<div id="box">123</div>
</div>
<p class="bottom">江苏畅享文化传媒提供技术支持</p>
</body>
<script type="text/javascript" src="zepto.js"></script>
<script type="text/javascript">
$('#menu li').eq(1).on('tap',function() {
	$('#box').load('list.html');
});
$('#menu li').eq(1).trigger('tap');
var openid=3233;
var name='aa';

$('.kan_btn').tap(function(){
	$.post('server.php',{openid:openid,name:name},function(data){
		if(data=='too'){ alert('您已参加过此活动了'); return false;  }
		data=JSON.parse(data);
		if($('#list').length>0){
			var node='';
			node+="<div class='item'>\n";
			node+=	"<img class='face' src='img/face.jpg'>\n";
			node+=	"<p>xx :刚刚给他砍了 5 元</p>\n";
			node+="</div>\n";
			$('#list').append(node);
		}
	});
});
</script>
</html>