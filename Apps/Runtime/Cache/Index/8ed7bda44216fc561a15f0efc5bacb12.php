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
    <link rel="stylesheet" type="text/css" href="__CSS__/home.css">
    <title>嘎嘎嘎</title>
</head>
<body>
<style type="text/css">
nav{
    max-width: var(--w);
    padding: 1rem;
    margin: auto;
}
nav ul{
    width: 30%;
    text-align: center;
    margin: auto;
    display: flex;
    font-size: .9rem;
    justify-content: space-around;
}
nav ul a:hover{
    border-bottom: 1px solid #C0C0C0;
}
#top_mao{
    height: 0;
    width: 0;
}
</style>
<header>
<p id="top_mao" name='top_mao'></p>
    <nav>
        <ul>
              <!-- <?php
 $_typeid = 1; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = M('Nav')->where("navtype='".$_typeid."'")->order('sort')->limit(5)->select(); import('Class.Category', APP_PATH); if($_typeid == 0) { $_navlist = Category::unlimitedForLayer($_navlist); }else { $_navlist = Category::unlimitedForLayer($_navlist, 'child', 0); } foreach($_navlist as $autoindex => $navlist): if ($navlist['child']) { $strtmp = ""; $strtmp .= "<ul>"; foreach ($navlist['child'] as $k1 => $v1) { if(strstr($v1['url'], '@')){ $cdata = M('category')->find(str_replace('@', '', $v1['url'])); $url = getUrl($cdata); }else{ $url = $v1['url']; } $strtmp .= "<li><a href='".$url."'>".$v1['name']."</a>"; if($v1['child']){ $strtmp .= "<ul>"; foreach ($v1['child'] as $k2 => $v2) { if(strstr($v2['url'], '@')){ $cdata = M('category')->find(str_replace('@', '', $v2['url'])); $url = getUrl($cdata); }else{ $url = $v2['url']; } $strtmp .= "<li><a href='".$url."'>".$v2['name']."</a></li>"; } $strtmp .= "</ul>"; } $strtmp .= "</li>"; } $strtmp .= "</ul>"; $navlist['child2'] = $strtmp; } if(strstr($navlist['url'], '@')){ $cdata = M('category')->find(str_replace('@', '', $navlist['url'])); $navlist['url'] = getUrl($cdata); }else{ $navlist['url'] = $navlist['url']; } ?><li> <a href='<?php echo ($navlist["url"]); ?>'><?php echo ($navlist["name"]); ?></a> </li><?php endforeach;?> -->
               <li> <a href='home'>网站首页</a> </li>
               <li> <a href='cases'>公司案例</a> </li>
               <li> <a href='team'>梦想团队</a> </li>
               <li> <a href='team'>关于我们</a> </li>
        </ul>
    </nav>
</header>

<div id="banner" class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="__IMG__/banner1.jpg"></div>
        <div class="swiper-slide"><img src="__IMG__/banner2.jpg"></div>
        <div class="swiper-slide"><img src="__IMG__/banner3.jpg"></div>
    </div>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
</div>
<div id="main">
    <figure>
        <img src='__P_IMG__/cases/1.jpg'>
        <figcaption>
            <p>卧室书房</p>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-more"></use>
            </svg>
        </figcaption>
    </figure>
    <figure>
        <img src='__P_IMG__/cases/2.jpg'>
        <figcaption>
            <p>卧室书房</p>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-more"></use>
            </svg>
        </figcaption>
    </figure>
    <figure>
        <img src='__P_IMG__/cases/3.jpg'>
        <figcaption>
            <p>卧室书房</p>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-more"></use>
            </svg>
        </figcaption>
    </figure>
    <figure>
        <img src='__P_IMG__/cases/4.jpg'>
        <figcaption>
            <p>卧室书房</p>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-more"></use>
            </svg>
        </figcaption>
    </figure>
    <figure>
        <img src='__P_IMG__/cases/5.jpg'>
        <figcaption>
            <p>卧室书房</p>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-more"></use>
            </svg>
        </figcaption>
    </figure>
    <figure>
        <img src='__P_IMG__/cases/6.jpg'>
        <figcaption>
            <p>卧室书房</p>
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-more"></use>
            </svg>
        </figcaption>
    </figure>
</div>


<footer>
<span class="left">© 2017 PAL設計事務所有限公司 版權所有 隱私政策</span>
<a href="#top_mao" id='top_mao_link'><svg class="icon" aria-hidden="true"><use xlink:href="#icon-dingbu"></use></svg> 回到頁頂</a>
</footer>
</body>
<script type="text/javascript" src='//at.alicdn.com/t/font_sga5f0cxcw86ko6r.js'></script>
<script type="text/javascript" src="__JS__/jquery.min.js"></script>
<script type="text/javascript" src='__JS__/jquery.swiper.js'></script>
<script type="text/javascript" src='__JS__/home.js'></script>
</html>