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
	<link rel="stylesheet" type="text/css" href="__CSS__/pay.css">
</head>
<style type="text/css">
	header{
		width: 100%;
		height: 200px;
		background: red;
	}

	#main{
		width: 95%;
		height: 100%;
		margin:25px auto 0;
		background: #fafafa;
		padding: 0 0 35px;
	}
	#main .title{
		width: 100%;
		height: 35px;
		line-height: 35px;
		text-align: center;
		font-size: 24px;
		padding: 10px 0;
		
	}
	#main .player{
		width: 95%;
		height: auto;
		display: block;
		margin:auto;
		border-radius: 10px;
		box-shadow:  2px 2px 3px #000;
	}
	#main .info{
		text-align: center;
		margin: 10px 0;
	}
	#main .info .face{
		width: 42px;
		border-radius: 50%;
	}
	#main .info span{
		height: 42px;
		line-height: 42px;
		overflow: hidden;
		display: inline-block;
		margin:0 0 0 10px;
		font-size: 20px;
	}
	#main .info textarea{
		width: 73%;
		height: 80px;
		margin:auto;
		display: block;
		resize:none;
		border:2px dashed #f60;
		padding: 8px;
		font-size: 18px;
		border-radius: 10px;
	}
	#main .info .pay{
		width: 80%;
		height: 45px;
		background: #DBB227;
		color:#fafafa;
		margin:10px auto;
		display: block;
		border:none;
		border-radius: 10px;
		font-weight: 700;
		font-size: 17px;
	}
</style>
<body>
	<header>

	</header>
	<div id="main">
		<p class="title">标题</p>
		<img class='player' src="__IMG__/108/丁冬.jpg">
		<div class="info">
			<p><img class='face' src='__IMG__/face.jpg'><span>微信用户 帮 xx 筹集 5块</span></p>
			<form action="{:U(send)}" method="post">
				<textarea placeholder="对他说两句吧" name='con'></textarea>
				<input type="hidden" name="pay" value="500">
				<input type="hidden" name="qid" value="5">
				<button type="submit" class="pay">付款</button>
			</form>
		</div>	
	</div>
</body>
</html>