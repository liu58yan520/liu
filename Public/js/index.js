$(function(){
	$('.top_menu').click(function(e){  //头部菜单显隐
		e.stopPropagation();   
		$('#top_menu').fadeIn()
	});
	 $(document).click(function(){
	    $("#top_menu").click(function(){  return; })
	    $("#top_menu").fadeOut();
	 });
	var mySwiper = new Swiper('.swiper-container', {
		autoplay: 2000,
		loop:true,
		pagination : '.swiper-pagination',
		autoHeight: true,
	})
	$('.home'). on('click',function(){ $('#main').load('Index/home') });
	$('.case'). on('click',function(){ $('#main').load('List/index?attr=case') });
	$('.about').on('click',function(){ $('#main').load('Index/about') });
	$('.home').trigger('click');
	$('#dialog .close').click(function(){
		$('#dialog').hide().siblings().css({opacity:1});
	});  
	$('#main').on('click','figure',function(){
		$('#dialog img').attr('src',$(this).find('img').attr('src'));
		$('#dialog').show().siblings().css({opacity:0.3});
	})
	$('#main').on('click','.more',function(){
		var node=$(this).parent();
		if(node.hasClass('case_list'))
			$('.case').trigger('click');
		else if(node.hasClass('worker_list'))
			$('.n3').trigger('click');
		else if(node.hasClass('pro_list'))
			$('.n4').trigger('click');
	})

$('#top_menu li').eq(0).click(function(){ $('.home').trigger('click')  });
$('#top_menu li').eq(1).click(function(){ $('.case') .trigger('click')  });
$('#top_menu li').eq(2).click(function(){ $('#main').load('List/index?attr=worker');  });
$('#top_menu li').eq(3).click(function(){ $('#main').load('List/index?attr=pro');  });
$('#top_menu li').eq(4).click(function(){ self:location='http://j.map.baidu.com/nfA3H'  });

$('#top_menu li').eq(6).click(function(){ $('.about').trigger('click')  });
});


