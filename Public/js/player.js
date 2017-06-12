$(function(){
	var baifen=$('#row .bg_red').attr('tar_width')*0.01;
$('#row .baifen').text(parseInt(baifen*100)+'%');
$('#row .bg_red').css({width:baifen*$('#row').width()+'px'});
$('#row .baifen').css({left:baifen*$('#row').width()-15+'px'});

	/****************主页3个菜单**************************/
	$('#nav button').eq(0).tap(function(){ //点击活动详情
	
	});

	$('#nav button').eq(1).tap(function(){ //点击捐款团列表

		$('#main').load($(this).attr('url')+'?id='+$('#id').text());
	});

	//$('#nav button').eq(1).trigger('tap');  //模拟点击
	/****************主页3个菜单结束**************************/


	$('#pay').tap(function(){ //点击帮他筹款
		$('#dialog .pic').attr('src',$('#dialog .pic').attr('data'));
		$('#dialog').show();
		$('#dialog').fadeIn().siblings().css({'opacity':'0.5'});
	});

	$('#dialog .money_num').eq(0).tap(function(){ $('#dialog input')[0].value=88; });
	$('#dialog .money_num').eq(1).tap(function(){ $('#dialog input')[0].value=66; });
	$('#dialog .money_num').eq(2).tap(function(){ $('#dialog input')[0].value=33; });	
	
	$('footer button').eq(1).tap(function(){ self:location=$(this).attr('data') });

	$('#dialog .pay_start').tap(function(){  //弹出框里点付款\
		var num=$('#dialog input').val();
		if(num=='') return false;
		$('#dialog .close').trigger('tap');
		$.post($(this).attr('url'),{qid:$('#id').text(),pay:$('#dialog input').val()},function(data){
			window.pay=JSON.parse(data);
			callPay();
		})
	})


	$('#dialog .close').tap(function(){ 
		$('#dialog').fadeOut().siblings().css({'opacity':'1'});
	});
	$('#dialog .other').tap(function(){
		$('#dialog').height(170);
		$('#dialog label').css({'display':'block','margin':'45px auto 0'});
	})
	$('#dialog .money_num').tap(function(){
		var num=$(this).text();
		$('#dialog input').val(num);
		$('#dialog .pay_start').trigger('tap'); 
	});

});