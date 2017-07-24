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
    <link rel="stylesheet" type="text/css" href="__CSS__/cases.css">
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
    <h4>爱北欧风 享受慢生活</h4>
    <p class="top_tit">设计师：朱家桢</p>
    <p class="top_tit">设计师：陈国建</p>
    <p class="top_tit">设计师：周叶靖宇</p>
    <img class="item" src="__IMG__/case_show/1.jpg">
    <h5>设计师说：</h5>
    <p class="text">干净的北欧风</p>
    <p class="text">简洁的浅白</p>
    <p class="text">搭配明亮的黄</p>
    <p class="text">以简及多的空间概念</p>
    <p class="text">整体感舒适自然</p>
    <img class="item dia" src="__IMG__/case_show/2.jpg">
    <p class="text">整个客厅是清爽的质感</p>
    <p class="text">素净的白</p>
    <p class="text">明媚的黄</p>
    <p class="text">安静的椰子棕</p>
    <p class="text">优雅的豆绿</p>
    <p class="text">将空间的气质提升到新的高度</p>
    <img class="item dia" src="__IMG__/case_show/3.jpg">
    <p class="text">心中向往的北欧</p>
    <p class="text">不可或缺的是一抹米色阳光。</p>
    <p class="text">平顶搭配吊灯</p>
    <p class="text">再加上四五个小射灯</p>
    <p class="text">空间的明度便呈现出来</p>
    <p class="text">工作闲暇之余</p>
    <p class="text">躺在慵懒的棉麻质沙发上</p>
    <p class="text">窗边斜阳余晖透过纱幔撒在书本和主人的脸庞</p>
    <p class="text">是呀&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日子的情趣也不过如此</p>
    <img class="item dia" src="__IMG__/case_show/4.jpg">
    <img class="part" src="__IMG__/case_show/n1.png">
    
    <img class="esp" src="__IMG__/case_show/4.jpg">
    <img class="part" src="__IMG__/case_show/n2.png">

    <p class="text">黑胡桃木制的圆形茶几</p>
    <p class="text">暖白的灯光照在茶几上</p>
    <p class="text">将北欧的温柔感融为一体</p>
    <p class="text">简洁又不失现代感</p>
</div>

<div class="pic_text" style="margin: 13vw auto 2vw;">

<section style="margin:2em 1em; display:flex;">
      <section style="border-width: 1px;box-sizing:border-box; border-style: dashed; border-color: rgb(204, 204, 204);line-height: normal; text-align: left;">
       <section style="display: inline-block; vertical-align: top; margin-top: -35px; padding: 6px;box-sizing:border-box; width: 40%; color: rgb(254, 254, 254); margin-bottom: -10px; float: left; margin-left: -4px; background-color: rgb(200,200,200);">
        <p style="line-height:0;"><img class="dia" src="__IMG__/case_show/b2.jpg" /></p>
       </section>
       <section style="width: 15px; height: 15px; border-radius: 50%; float: right; margin-top: -6px; margin-right: -6px; color: rgb(254, 254, 254); background-color: rgb(66, 85, 96); box-sizing: border-box;"></section>
       <section style="width: 40px; height: 40px; border-radius: 50%; margin-top: -20px; float: left; margin-left: -15px; color: rgb(254, 254, 254); background-color: rgb(66, 85, 96); box-sizing: border-box;"></section>
       <section style="vertical-align: top; padding: 20px 5px; display: inline-block; width: 45%; box-sizing: border-box;">
        <section style="border-bottom: 2px solid rgb(86, 111, 127); border-top-color: rgb(86, 111, 127); border-right-color: rgb(86, 111, 127); border-left-color: rgb(86, 111, 127); width: 100%; margin-bottom: 10px; box-sizing: border-box;">
         <span style="line-height: 1.75em; font-size: 16px; color: #000000;" >Zhu Yuan Run</span>
        </section>
        <p style="line-height: 1.5em;"><span style="font-size: 14px;">国际精品家居领导者</span></p>
       </section>
      </section>
      <section style="width: 8px; height: 8px; border-radius: 50%; float: right; margin-top: -4px; margin-right: -4px; color: rgb(254, 254, 254); background-color: rgb(66, 85, 96); box-sizing: border-box;"></section>
</section>

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
<div id="dialog">
    <img class="xx close" src="__IMG__/XX.png">
    <img class="dialog_img" src="__IMG__/case_show/4.jpg">
</div>

</body>
<script type="text/javascript" src="__JS__/jquery.min.js"></script>
<script type="text/javascript" src='__JS__/base.js'></script>
</html>