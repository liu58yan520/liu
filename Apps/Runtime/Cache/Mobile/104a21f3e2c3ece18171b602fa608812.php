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
    <link rel="stylesheet" type="text/css" href="__CSS__/about.css">
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
    <div class="full"> <img src="__IMG__/case_show/1.jpg"> </div>
    <h4>使命</h4>   
    <p class="text">让设计成为心灵的伴侣，让空间变成活的灵魂</p>
    <h4>愿景</h4>   
    <p class="text">成为创意设计行业的引领者</p>
     <div id='we' class="swiper-container">
        <div class="swiper-wrapper">
            <?php $__FOR_START_21367__=1;$__FOR_END_21367__=12;for($i=$__FOR_START_21367__;$i < $__FOR_END_21367__;$i+=1){ ?><div class="swiper-slide"><img class="item" src="__P_IMG__/we/<?php echo ($i); ?>.jpg"></div><?php } ?>
        </div>
        <div class="swiper-pagination"></div>
    </div> 
    <h4>社会责任</h4>
    <p class="text">不忘初心，打造健康积极的办公环境，为客户提供优质环保的设计装修，自觉的把社会责任融入公司发展战略。</p>
    
    <div class="full"> <img src="__P_IMG__/cases/1.jpg"> 
        <p class="bg_text">获奖案例<br>  <span><a href="cases">查看完整案例</a></span></p>
    </div>
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
<section style="display: inline-block; width: 100%; vertical-align: top; color: #555;" data-width="100%">
     <section style="margin-right: 0%; margin-left: 0%; font-size: 11.2px; position: static;transform: translate3d(0px, 0px, 0px);-webkit-transform: translate3d(0px, 0px, 0px);-moz-transform: translate3d(0px, 0px, 0px);-ms-transform: translate3d(0px, 0px, 0px);-o-transform: translate3d(0px, 0px, 0px);">
      <section style="display: inline-block; padding-right: 0.2em; padding-top: 0.5em;box-sizing:border-box;">
       <section style="display: inline-block; vertical-align: top; width: 3em; height: 3em; border: 1px solid rgb(23, 23, 20); padding: 3px; box-sizing:border-box;border-radius: 100%;">
        <section style="width: 100%; height: 100%;color: #fff; border-radius: 100%; background-color: rgb(23, 23, 20); text-align: center; color: rgb(254, 254, 254); font-size: 10px; line-height: 30PX; box-sizing: border-box;" data-width="100%">
         <section >
ZYZ
         </section>
        </section>
       </section>
       <section style="display: inline-block; vertical-align: top; width: 6px; height: 6px; border-radius: 100%; margin-left: -0.5em; background-color: rgb(23, 23, 20); box-sizing: border-box;"></section>
       <section style="display: inline-block; vertical-align: top; width: 3px; height: 3px; border-radius: 100%; margin-top: -0.22em; margin-left: 0.1em; background-color: rgb(23, 23, 20); box-sizing: border-box;"></section>
      </section>
     </section>
     <section style="margin-right: 0%; margin-left: 0%; position: static;">
      <section style="display: inline-block; width: 100%; vertical-align: top;box-sizing:border-box; padding-left: 16px; border-width: 0px;" data-width="100%">
       <section style="display: inline-block; width: 100%; vertical-align: top; border-left: 2px dashed rgb(160, 160, 160); border-bottom-left-radius: 0px; box-sizing:border-box;padding-left: 10px;" data-width="100%">
        <section style="margin: -30px 0% 10px; position: static;">
         <section style="display: inline-block; width: 100%; vertical-align: top;box-sizing:border-box; padding-left: 15px;" data-width="100%">
          <section style="margin-right: 0%; margin-left: 0%; text-align: center; position: static;transform: translate3d(0px, 0px, 0px);-webkit-transform: translate3d(0px, 0px, 0px);-moz-transform: translate3d(0px, 0px, 0px);-ms-transform: translate3d(0px, 0px, 0px);-o-transform: translate3d(0px, 0px, 0px);">
           <section  data-brushtype="text" style="text-align: justify;font-weight:bold; font-size: 18px;">
价值观
           </section>
          </section>
         </section>
        </section>
        <section style="margin-right: 0%; margin-bottom: 5px; margin-left: 0%; position: static;font-size: 14px;">
         <section >
作为新兴创意设计企业，我们前行的道路是没有终点的。我们努力呈现的是以专业、周到的服务为赢取市场价值和品牌价值的最大化，同时凭着敏感的品味触角以及全面的专业素质，我们的团队正在源源不断地向社会奉献上精心设计的佳作。
         </section>
        </section>
       </section>
      </section>
     </section>
    </section>

</div>
<div id="dialog">
    <img class="xx close" src="__IMG__/XX.png">
    <img class="dialog_img" src="__IMG__/case_show/4.jpg">
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
<script type="text/javascript" src='__JS__/jquery.swiper.js'></script>
<script type="text/javascript" src='__JS__/base.js'></script>
<script type="text/javascript">
    var banner = new Swiper('#we',{
        autoplay : 1200,
        speed:700,
        loop:true,
        pagination: '.swiper-pagination',
        paginationClickable: '.swiper-pagination',
        effect: 'coverflow'
    });
</script>
</html>