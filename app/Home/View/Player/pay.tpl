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
<body>
	<header>

	</header>
	<div id="main">
		<p class="title">标题</p>
		<img class='player' src="__IMG__/108/{$info.player_name}.jpg">
		<div class="info">
			<p><img class='face' src='__IMG__/face/{$info.openid}.jpg'><span>{$info.fans_name} 帮 {$info.player_name} 筹集 {$info.num}块</span></p>
			<form action="{:U(send)}" method="post">
				<textarea placeholder="对他说两句吧" id='con' name='con'></textarea>
				<input type="hidden" name="player_name" value="{$info.player_name}">
				<input type="hidden" name="name" value="{$info.fans_name}">
				<input type="hidden" name="openid" value="{$info.openid}">
				<input type="hidden" name="pay" value="{$info.num}">
				<input type="hidden" name="qid" value="{$info.qid}">
				<button type="submit" class="pay">付款</button>
			</form>
		</div>	
	</div>
</body>
<script type="text/javascript">
document.getElementsByClassName('pay')[0].onclick=function(){
	if(document.getElementById('con').value.length>30){
		alert('请输入30个字以内');
		return false;
	}

	
}

</script>
</html>