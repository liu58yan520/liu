$(function(){

	/****************主页3个菜单**************************/
	$('#nav button').eq(0).tap(function(){ //点击捐款团列表
		self.location="test";
	});

	$('#nav button').eq(1).tap(function(){ //点击捐款团列表
		$('#main').load('player_list');
	});

	$('#nav button').eq(1).trigger('tap');  //模拟点击
	/****************主页3个菜单结束**************************/
	$('#pay').tap(function(){ //点击帮他筹款
		$('#dialog').show();
		$('#dialog').fadeIn().siblings().css({'opacity':'0.5'});
	
	});



	$('#dialog .close').tap(function(){
		$('#dialog').fadeOut().siblings().css({'opacity':'1'});
	})

	/*************付款加减按钮*************************/
	$('#dialog .pay_num button').eq(0).tap(function(){
		var pay_num=$('#dialog .pay_num .pay_num_text').val();
		if(pay_num<500)
			$('#dialog .pay_num .pay_num_text').val(Number(pay_num)+1);
	});
	
	$('#dialog .pay_num button').eq(1).tap(function(){
		var pay_num=$('#dialog .pay_num .pay_num_text').val();
		if(pay_num>1)
			$('#dialog .pay_num .pay_num_text').val(Number(pay_num)-1);
	

		
	});
	/*************付款加减按钮结束*************************/


});