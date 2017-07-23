$('#top_menu img').click(function(){
    $('#top_menu_list').show();
});
$('.close').click(function(){
    $(this).parent().hide();
});
$('.dia').on('click',function(){
    $('#dialog .dialog_img').attr('src',$(this).attr('src'));
    if($('#dialog .dialog_img'))
    $('#dialog').show();
});