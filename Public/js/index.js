$(function(){

	$('.index').tap(function(){
		$('#main').load('Index/index_item');
	});
	$('.rank').tap(function(){
		$('#main').load('Index/rank_item');
	});
	$('.index').trigger('tap');

});