$(function(){
	$('.top_menu').click(function(e){  //头部菜单显隐
		e.stopPropagation();   
		$('#top_menu').fadeIn()
	});
	 $(document).click(function(e){
		var _con = $('#top_menu');   
		if(!_con.is(e.target) && _con.has(e.target).length === 0)
			$('#top_menu').slideUp('slow');           
	});

	var mySwiper = new Swiper('.swiper-container', {
		autoplay: 2000,
		loop:true,
		pagination : '.swiper-pagination',
		autoHeight: true,
	})
	$('.home'). on('click',function(){ $('#main').load('Index/home') });
	$('.case'). on('click',function(){ $('#main').load('Case/index') });
	$('.about').on('click',function(){ $('#main').load('Index/about') });

	$('.n1').on('click',function(){    $('#main').load('Index/about')} );
	$('.home').trigger('click');

});