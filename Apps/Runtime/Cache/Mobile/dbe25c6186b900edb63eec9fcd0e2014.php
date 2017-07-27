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
    <link rel="stylesheet" type="text/css" href="__CSS__/team.css">
    <title>梦之队</title>
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
  
    <h4>设计团队：</h4>
    <div class="text">
&nbsp;&nbsp;&nbsp;&nbsp;筑园润的每个成员组成了最佳的团队组合，其核心骨干均有多年设计实战经验。工作中，我们提倡和谐的团队协作、自由的创作空间，尊重客户利益，与客户共同成长。<br>
&nbsp;&nbsp;&nbsp;&nbsp;强大的团队凝聚力，使我们的工作效率达到了1+1>2的完美效果，并成功合作完成多种项目的设计风格，保证了项目整体解决方案的完美性，确保客户得到最好的服务和最佳解决方案。
    </div>
    <img class="dia" src="__P_IMG__/team/all.jpg">
    <h4>我们的团队</h4>
    <div class="pic"> 
        <figure>
            <figcaption class="n1"><span>陈国建</span>·<i>Aaron chen</i></figcaption>
            <figcaption class="n2">筑园润创始人 设计总监</figcaption>
            <img class="dia" src='__P_IMG__/team/陈国建.jpg'>
            <figcaption class="n3">擅长风格：港式、欧式、现代、新中式</figcaption>
            <figcaption class="n4">
            &nbsp;&nbsp;&nbsp;&nbsp;陈国建先生于2017年初创立了筑园润装饰设计公司，其本身具有丰富的室内设计经验和一定的专业深度。经过多年的经验累积，陈国建先生对各种设计风格已经能够娴熟驾驭，逐渐形成个人风格。通过对艺术美感的精准平衡和视觉效果的准确把握，把高贵优雅的原创美学、尊贵品位的设计理念渗透到每个设计中。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;通过设计，陈国建先生带领其团队将具卓越创意的设计与精湛成熟的工艺完美结合，配合极具人文品位的陈设艺术，为筑园润每一位客户创造最大的价值，并努力将筑园润打造成一个追求卓越品质的室内设计品牌。
            </figcaption>
            <figcaption class="n5"><strong>设计理念</strong>：<i>设计的创意自于文化的深刻理解。</i></figcaption>
        </figure>
        <figure>
            <figcaption class="n1"><span>朱家桢</span>·<i>Charles Zhu</i></figcaption>
            <figcaption class="n2">高级室内设计师</figcaption>
            <img class="dia" src='__P_IMG__/team/朱家桢.jpg'>
            <figcaption class="n3">擅长风格：欧式、现代、新中式、美式</figcaption>
            <figcaption class="n4">
            &nbsp;&nbsp;&nbsp;&nbsp;从事室内装饰设计六年，曾参与当地多项高级设计装修案例，具备丰富的装修设计经验，有着深厚的美术功底和艺术修养。在新锐室内设计师领域内具有一定的影响力。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;作为筑园润主设计师之一，朱家桢先生以个人独特的设计风格以及多年的美学素养，将装修元素结合当代设计，并灵活运用新中式里的东方美学，成功塑造了现代室内设计时尚多元的生活形态。着重于细节，回归于作品本身，他赋予了每份设计新的内涵。
            </figcaption>
            <figcaption class="n5"><strong>设计理念</strong>：<i>创作是一种习惯，也是一种享受。</i></figcaption>
        </figure>
        <figure>
            <figcaption class="n1"><span>李靖</span>·<i>Barnett  Li</i></figcaption>
            <figcaption class="n2">高级室内设计师</figcaption>
            <img class="dia" src='__P_IMG__/team/李靖.jpg'>
            <figcaption class="n3">擅长风格：欧式、现代、新中式、田园风</figcaption>
            <figcaption class="n4">
            &nbsp;&nbsp;&nbsp;&nbsp;从事室内装饰设计五年有余。目前在筑园润担任主设计师一职。作为一名极具想象力和个人追求的室内设计师，李靖先生以其优异和独特的设计理念、空间组织想象力以及对细部的掌控能力，使得作品兼具优秀的设计品质与震撼愉悦的空间效果，引领着设计潮流的方向。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;李靖不但精于设计实践，且勤于思考，他的设计思想并没有盲目的紧跟潮流，而是以其个人对实际生活的理解和客户需求的分析，并集中于在虚幻与真实的角色转换过程中的情感体验元素。这些视点的高度以及对技术细节的深入把握使其作品具有非凡的空间效果，同时也保证了作品整体设计方案的完美性。
            </figcaption>
            <figcaption class="n5"><strong>设计理念</strong>：<i>设计就是着重于点、线、面的灵活运用。</i></figcaption>
        </figure>
        <figure>
            <figcaption class="n1"><span>周叶靖宇</span>·<i>Allen Zhou</i></figcaption>
            <figcaption class="n2">资深效果表现师</figcaption>
 <!--            <img class="dia" src='__P_IMG__/team/周叶靖宇.jpg'> -->
            <figcaption class="n3">擅长类型:家居住宅，别墅豪宅，商业展示，会所等</figcaption>
            <figcaption class="n4">
            &nbsp;&nbsp;&nbsp;&nbsp;作为筑园润设计团队中的核心成员，周叶靖宇先生目前担任首席效果图表现师一职。从小受到浓厚艺术氛围的熏陶的他，在之后的学习生涯中，对家具工艺和室内装饰产生了独特的情愫，由此开始了设计创作之路。他认为最佳的效果呈现是对设计最好的诠释，也是设计作品灵魂所在。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;常行走于不同的城市的他，善于细腻地观察和体验不同的民风民俗，研究不同的生活模式与人的需求，并将这些糅合于空间效果表达中。所以他的作品总是极具个性与意境，让人去体验空间灵魂带给人的与众不同的感受和影响。
            </figcaption>
            <figcaption class="n5"><strong>设计理念</strong>：<i>空间设计是源于人的设计。</i></figcaption>
        </figure>
    </div>
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
#box .icon{
    width: 4vw;
    display: inline-block;
    margin: 0 0 0 1vw;
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
            <em>电话: <a href="tel:0511-84425678">0511-84425678 <img class="icon" src="__IMG__/tel.png"></a></em>
            <em>地址: 镇江市天桥路5号旭辉时代大厦9号楼1011-1012 <img class="icon" src="__IMG__/city.png"> </em> 
        </div>
    </div>
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
<script type="text/javascript" src='__JS__/base.js'></script>
</html>