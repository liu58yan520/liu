$(function(){
	window.count_NUM=300;  //总价格
	window.USER;

	$('#select').tap(function(){
		name = $('#main input').val();
		if(name==''||name=='undefined')
			return false;
		$.get('Index/select?name='+name, function(data){
			USER= JSON.parse(data);
			console.log(USER);
			if(USER){
				$('#dialog .con').eq(0).text(name);
				if(USER.createat){
					$('#dialog .con').eq(1).text('还差 '+(window.count_NUM-Number(USER.count_pay))+'元');
					$('.btn .create').text('前往活动');
				}
				else
					$('#dialog .con').eq(1).text('未创建活动');
					
				$('#dialog .pic').attr('src',IMG+"/108/"+name+".jpg");
			}else{
				$('.btn .create').hide();
				$('#dialog .con').eq(0).text('查无此人');
				$('#dialog .con').eq(1).text('不是108唱将');
				$('#dialog .pic').attr('src',IMG+"/select_no.jpg");
			}
			$('#dialog').fadeIn().siblings().css({'opacity':'0.5'});

		});
	})

	$('#dialog .close').tap(function(){
		$('#dialog').fadeOut().siblings().css({'opacity':'1'});
		$('.btn .create').show();
	})
	$('#dialog .create').tap(function(e){
		if(USER.id==''||USER.id=='undefined'){
			e.preventDefault();
			return false;
		}

		$.get('Index/createPlayer?id='+USER.id, function(data){
			url=$('#dialog .create').attr('href');
			if(data){
				window.location=url+"?id="+USER.id;
			}
		});
	})


});
function empty(data){
return (data == "" || data == undefined || data == null) ? false : data; 
}