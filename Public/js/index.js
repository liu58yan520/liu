$(function(){
	window.id='';
	$('#select').tap(function(){
		name = $('#main input').val();
		if(name==''||name=='undefined')
			return false;
		$.get('Index/select?name='+name, function(data){
			console.log(data);
			if(data){
				id=data;
				$('#dialog .con').eq(0).text(name);
				$('#dialog .con').eq(1).text('未创建活动');
				$('#dialog .pic').attr('src',IMG+"/108/"+name+".jpg");
			}else{

				$('#dialog .con').eq(0).text('查无此人');
				$('#dialog .con').eq(1).text('不是108唱将');
				$('#dialog .pic').attr('src',IMG+"/select_no.jpg");
			}
			$('#dialog').fadeIn().siblings().css({'opacity':'0.5'});

		});
	})

	$('#dialog .close').tap(function(){
		$('#dialog').fadeOut().siblings().css({'opacity':'1'});
	})
	$('#dialog .create').tap(function(e){
		if(id==''||id=='undefined'){
			e.preventDefault();
			return false;
		}

		$.get('Index/create?id='+id, function(data){
			url=$('#dialog .create').attr('href');
			if(data){
				window.location=url+"?id="+id;
			}
			

		});
	})


});