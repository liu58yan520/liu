$(function () {

	$('#nav ul li').click(function(){
		$(this).addClass('selected_li').next('.item').fadeIn();
		$(this).siblings().removeClass('selected_li').next('.item').fadeOut();	
	})
	$('#nav ul .item div').click(function(){
		$(this).addClass('selected_div').siblings().removeClass('selected_div');	
	});
	var nav_div_selected_index=$('#nav .selected_li .selected_div').index();
	switch($('#nav .selected_li').index()){

		case 0: 
			if(nav_div_selected_index==0)
				$('#main').load('All/index');
		break;
	}




})