$(function(){
	window.count_NUM=300;  //总价格
	var  a=3;
	alert(empty(a))
	$('#select').click(function(){
		name = $('#main input').val();
		if(name==''||name=='undefined')
			return false;
		$.get('Index/select?name='+name, function(data){
			console.log(data);
			if(data!=null){
				USER= JSON.parse(data);
				console.log(USER);
				$('#dialog .con').eq(0).text(name);
				
				if(USER.createat==null)
					$('#dialog .con').eq(1).text('未创建活动');
				else
					$('#dialog .con').eq(1).text('还差 '+(window.count_NUM-Number(USER.count_pay))+'元');
				$('#dialog .pic').attr('src',IMG+"/108/"+name+".jpg");
			}else{

				$('#dialog .con').eq(0).text('查无此人');
				$('#dialog .con').eq(1).text('不是108唱将');
				$('#dialog .pic').attr('src',IMG+"/select_no.jpg");
			}
			$('#dialog').fadeIn().siblings().css({'opacity':'0.5'});

		});
	})

	$('#dialog .close').click(function(){
		$('#dialog').fadeOut().siblings().css({'opacity':'1'});
	})
	$('#dialog .create').click(function(e){
		if(USER.id==''||USER.id=='undefined'){
			e.preventDefault();
			return false;
		}

		$.get('Index/create?id='+USER.id, function(data){
			url=$('#dialog .create').attr('href');
			if(data){
				window.location=url+"?id="+USER.id;
			}
		});
	})


});
function empty(data){
	if(data.length==0 || typeof(data)=="undefined" || data==null || data==false || data=='' || data=='false' )
		return false;
	else
		return data;
}