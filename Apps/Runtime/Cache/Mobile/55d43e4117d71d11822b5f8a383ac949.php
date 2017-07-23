<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta name="full-screen" content="true">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <link rel="stylesheet" type="text/css" href="__CSS__/common.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/call.css">
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=FvEh9dkKto7qyuagscLZgnuUzYv1iA5c"></script>
    <title>Document</title>
</head>
<body>
<div id="top_menu"><img src="__IMG__/top_menu.png"><img class="logo" url='__P_IMG__' src="__P_IMG__/logo_h1.png"></div>
<div id="top_menu_list">
    <div class="close"><img src="__IMG__/X.png"></div>
    <div id="logo"><img src="__P_IMG__/logo_tou.png"></div>
    <ul>
        <?php
 $_typeid = 1; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = M('Nav')->where("navtype='".$_typeid."'")->order('sort')->select(); import('Class.Category', APP_PATH); if($_typeid == 0) { $_navlist = Category::unlimitedForLayer($_navlist); }else { $_navlist = Category::unlimitedForLayer($_navlist, 'child', 0); } foreach($_navlist as $autoindex => $navlist): if(strstr($navlist['url'], '@')){ $cdata = M('category')->find(str_replace('@', '', $navlist['url'])); $navlist['url'] = getUrl($cdata); }else{ $navlist['url'] = $navlist['url']; } ?><li>
		   <a href='/Mobile/Index/<?php echo ($navlist["url"]); ?>'><?php echo ($navlist["name"]); ?></a>
		  </li><?php endforeach;?>
        <li>筑圆润 | 国际精品家装<img src="__IMG__/huanguan.png"></li>
    </ul>
</div>
<div id="main">
    <img src="__IMG__/case_show/1.jpg">
    <style type="text/css">
#box{
    width: 90%;
    margin: 3vw auto;
    padding: 1vw;
    border:3px solid #040000;
}
#box .bg{
    border:1px solid #040000;
    border-radius: 5px;
}
#box h4{
    padding: 3vw 3vw 0 3vw;
}
#box .text{
    margin: 1vw auto;
    color: #240000;
    font-size: 2.9vw;
    line-height: 5vw;
    letter-spacing:2px;
    padding: 3vw;
}
#box .text p{
    text-indent: 4vw;
}
#box .text em{
    color: #101010;
    font-size: 2.7vw;
    letter-spacing:1px;
    display: block;
}
#box i{
    font-size: 3vw;
    transform: scale(.7,.7);
    display: block;
    margin-left: -12vw; 
}
</style>
<div id="box">
    <div class="bg">
        <h4>筑润园 生活馆</h4>
        <i>Zhu Yuan Run&nbsp;&nbsp;Living museum</i>
        <div class="text">
            <p>江苏筑园润装饰设计工程有限公司成立于2017年初，是一家私营大中型公司。自成立以来，公司秉承以人为本的理念，为我们的客户提供专业化和高质量的设计服务，让设计充分满足客户需求又能体现不凡的品味。</p>
            <p>作为一家专业化设计公司，我们拥有包括建筑设计、室内设计、景观设计以及经济等领域的人才。公司聚集的一群设计独特，新颖的年轻才干，以及经验丰富的工程师团队，使形成多领域跨界合作完成项目设计的风格，保证了设计整体实施的完美。</p>
            <p>本公司主要提供的服务有：建筑装饰工程、地坪工程、钢结构工程、建筑防水工程、防腐保温工程、地基与基础工程设计、施工：建材、金属材料销售等多种类型。</p>
            <p>筑园润企业形象设计立志做品牌最亲密的设计建造管理者，做真正为客户提供优质服务的设计开发者，我们享受设计创造的喜悦，同客户分享设计成就的价值，为此我们自豪并为之前行。</p>
            <em>电话: <a href="tel:0511-84425678">0511-84425678</a></em>
            <em>地址: 镇江市天桥路5号旭辉时代大厦9号楼1011-1012 </em> 
        </div>
    </div>
</div>
    <div id="allmap"></div>
</div>
<footer>
    <div class="last">
        <img src="__P_IMG__/logo_b.png">
        <div id="power">
            <p>© 2017 PAL設計事務所有限公司 版權所有 </p>
            <p>隱私政策</p>
        </div>
    </div>
</footer>
</body>
<script type="text/javascript" src="__JS__/jquery.min.js"></script>
<script type="text/javascript" src='__JS__/base.js'></script>
<script type="text/javascript" src='__JS__/map.js'></script>
</html>