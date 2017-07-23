<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta name="full-screen" content="true">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <link rel="stylesheet" type="text/css" href="__CSS__/swiper.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/common.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/index.css">
    <title>嘎嘎嘎</title>
</head>
<body>
<div id='banner' class="swiper-container">
    <div class="swiper-wrapper">
        <?php $__FOR_START_11195__=1;$__FOR_END_11195__=6;for($i=$__FOR_START_11195__;$i < $__FOR_END_11195__;$i+=1){ ?><div class="swiper-slide"><img src="__P_IMG__/cases/<?php echo ($i); ?>.jpg"></div><?php } ?>
    </div>
</div>
<div id="bg">
    <div id="center" class="en"><a href="<?php echo U('Index/Index/home','','');?>">筑圆润 | 国际精品</a></div>
</div>
</body>
<script type="text/javascript" src="__JS__/jquery.min.js"></script>
<script type="text/javascript" src='__JS__/jquery.swiper.js'></script>
<script type="text/javascript" src='__JS__/index.js'></script>
</html>