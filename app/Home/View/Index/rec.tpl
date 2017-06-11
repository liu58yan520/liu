<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="full-screen" content="true">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__CSS__/common.css">
	<link rel="stylesheet" type="text/css" href="__CSS__/rec.css">
</head>
<body>
<header>
	<div class="left"> <img src="__IMG__/top.jpg"></div>
	<div class="right">
		<p>标题xxx</p>
		<p class='money'>300￥</p>
	</div>	
</header>
<div id="row"></div>
<div id="main">
<ul>
	<form action='create' method="post" id='form' >
		<li><span class="text">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</span><input type="text" name="true_name"  placeholder="请输入姓名"> </li>
		<li><span class="text">联系方式：</span><input type="number" name="tel"  placeholder="请输入手机号码"></li>
		<li><span class="text">身份证号：</span><input type="text" name="card" placeholder="请输入身份证号"></li>
	</form>
</ul>

</div>
<footer>
	<button id='submit' form='form'>发起项目</button>
</footer>

<script type="text/javascript" src='__JS__/zepto.js'></script>
<script type="text/javascript" src='__JS__/rec.js'></script>
</body>
</html>