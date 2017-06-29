<link rel="stylesheet" type="text/css" href="__CSS__/index_item.css">

	<div class="rec_time">
		距离本次投票结束还有：<span id="t_d"></span>天<span id="t_h"></span>时<span id="t_m"></span>分<span id="t_s"></span>秒
	</div>	
	<div class="seach">
		<input type="text" name="name" placeholder="请输入参赛者姓名">
		<button>
			<svg class="icon" aria-hidden="true">
			    <use xlink:href="#icon-sousuo-sousuo"></use>
			</svg>
			查询
		</button>
	</div>
	<p class="tishi">参与投票需关注中南世纪城官方公众号 <b>展示二维码</b></p>
	<div id="list">
	<div class="bg"></div>
		<volist name='user' id='arr'> 
			<figure>
				<img src="__IMG__/user/{$arr.name}.jpg">
				<p class="uid none">{$arr.id}</p>
				<figcaption>
					<span class="name">{$arr.name}</span>
					<span class="poll">{$arr.poll}票</span>
				</figcaption>
				<div class="rank">{$arr.rank}</div>
			</figure>
		</volist>
	</div>
<div id="show_logo" class="none" >
<p>长按图片 点击识别图中二维码关注 
		<svg class="icon" aria-hidden="true">
		    <use xlink:href="#icon-guanbi"></use>
		</svg>
</p>
<img src="__IMG__/ewm.jpg">
</div>
<script type="text/javascript">
$('#list figure').on('tap',click_player)
function click_player(){
    self:location='Player/index/id/'+$(this).find('.uid').text();
}
$('.tishi b').tap(function(){
	$('.top').css({opacity:0.2});
	$('footer').css({opacity:0.2});
	$('#show_logo').show().siblings().css({opacity:0.2});
})
$('#show_logo p .icon').tap(function(){
	$('.top').css({opacity:1});
	$('footer').css({opacity:1});
	$('#show_logo').hide().siblings().css({opacity:1});
})


//var rec_time=setInterval(GetRTime,0);
function GetRTime(){
    var EndTime= new Date('2017/07/15 00:00:00');
    var NowTime = new Date();
    var t =EndTime.getTime() - NowTime.getTime();
    var d=0;
    var h=0;
    var m=0;
    var s=0;
    if(t>=0){
    	$('#t_d').text(Math.floor(t/1000/60/60/24));
    	$('#t_h').text(Math.floor(t/1000/60/60%24));
    	$('#t_m').text(Math.floor(t/1000/60%60));
    	$('#t_s').text(Math.floor(t/1000%60));
    }else{
	    $('.rec_time').text('投票已结束');
	   	clearInterval(rec_time)
    }
  }
$('.seach button').tap(function(){
	var name=$('.seach input').val();
	if(name=='')
		$('.index').trigger('tap');
	else{
		$.post('Index/getPlayerOne',{name:name},function(data){
			if(data==null){
				alert('没有此人');
				return;
			}
			$('#list figure').detach();
			var node="<figure>\n";
				node+="<img src='__IMG__/user/"+data.name+".jpg'>\n"
				node+="		<p class='uid none'>"+data.id+"</p>\n"
				node+="		<figcaption>\n"
				node+="			<span class='name'>"+data.name+"</span>\n"
				node+="			<span class='poll'>"+data.poll+"票</span>\n"
				node+="		</figcaption>\n"
				node+="	</figure>\n";
			$('#list').append($(node));
			$('#list figure').on('tap',click_player);
		})}
	});


// window.loadnum=0;  //懒加载
// window.getnum=10;

// 	$(window).scroll(function(){
// 		if(loadnum>5) return ; 
// 	　　var scrollTop = $(this).scrollTop();
// 	　　var scrollHeight = $(document).height();
// 	　　var windowHeight = $(this).height();
// 	　　if(scrollTop + windowHeight == scrollHeight){
// 			var start=loadnum++*10;
// 			console.log(start,10);
//  // 　　　　$.post('Index/getPlayerlist',{start:start,count:start+10},function(data){
//  // 		});
// 	　　}
// 	});


</script>