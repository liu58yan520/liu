$(function(){
$('#row .bg_red').css({'width':$('#row .bg_red').attr('tar_width')+'%'});
	/****************主页3个菜单**************************/
	$('#nav button').eq(0).tap(function(){ //点击活动详情
	
	});

	$('#nav button').eq(1).tap(function(){ //点击捐款团列表

		$('#main').load($(this).attr('tar_url'));
	});

	//$('#nav button').eq(1).trigger('tap');  //模拟点击
	/****************主页3个菜单结束**************************/


	$('#pay').tap(function(){ //点击帮他筹款
		$('#dialog .pic').attr('src',$('#dialog .pic').attr('data'));
		$('#dialog').show();
		$('#dialog').fadeIn().siblings().css({'opacity':'0.5'});
	});

	


	$('#dialog .pay_start').tap(function(){  //弹出框里点付款\
		var num=$('#dialog .pay_num_text').val();
		if(isNaN(num))
			return false;
		$('#dialog').hide();
		self.location='pay?'+$(this).attr('data')+num;
	})

	$('#dialog .close').tap(function(){ 
		$('#dialog').fadeOut().siblings().css({'opacity':'1'});
	});



});

