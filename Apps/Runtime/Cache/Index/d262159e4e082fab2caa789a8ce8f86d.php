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
    <link rel="stylesheet" type="text/css" href="__CSS__/team.css">
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
<div id="main">
    <img class="team_pic" src="__P_IMG__/team/all.jpg">


<section data-role="outer" label="Powered by 135editor.com" style="font-family:微软雅黑;font-size:16px;">
   <section class="_135editor" data-tools="135编辑器" data-id="89156" style="border: 0px none; padding: 0px; box-sizing: border-box;">
    <section style="padding: 10px; box-sizing: border-box;">
     <section style="width:290px; margin-left:auto; margin-right:auto;" data-width="290px">
      <section style="float: left; width: 165px; border: 1px solid rgb(8, 7, 7); height: 194px; overflow: hidden; box-sizing: border-box;" data-width="165px">
       <img style="display:block; width:100%; height:193px !important;" src="http://mmbiz.qpic.cn/mmbiz_png/fgnkxfGnnkSBJo13oUicPbCbqeTcIyiakNIicaPMKkqELlxcLBwstzXR96o1icG37eZyXelGh2eT6rWibDnN5y7Z3hA/0.png" data-width="100%" />
      </section>
     </section>
     <section style="width: 120px; height: 170px; float: left; margin-top: 23px; border: 1px solid rgb(8, 7, 7); box-sizing: border-box;" data-width="120px">
      <section style="width: 119px; height: 168px; border-right: 1px solid rgb(255, 255, 255); border-top: 1px solid rgb(255, 255, 255); border-bottom: 1px solid rgb(255, 255, 255); background-color: rgb(8, 7, 7); box-sizing: border-box;" data-width="119px">
       <span style="font-size:12px; color:#fff; padding:10px 10px; display:block;">956年，张国荣出生于香港，家里兄弟姐妹共有十人，张国荣是最小的一个。 张国荣的父亲是香港洋服店的裁缝兼老板张活海...</span>
      </section>
     </section>
     <section style="width:100%; clear:both;" data-width="100%"></section>
    </section>
   </section>
   <p><br /></p>
   <section data-role="paragraph" class="_135editor" style="border: 0px none; padding: 0px; box-sizing: border-box;">
    <p><br /></p>
   </section>
  </section>



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