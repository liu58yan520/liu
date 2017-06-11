$(function(){
	window.count_NUM=300;  //总价格
	var more=true;
	$('#main .more').tap(function(){
		if(more){
			//这里写  如果content没有内容就load
			$('#content').show()
			more=false;
		}else{
			$('#content').hide()
			more=true;
		}
	});
	$('#submit').tap(function(){
		self:location =$(this).attr('url')
	});


});
