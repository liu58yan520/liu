$(function(){
    $('.close').click(function(){
        $(this).parent().hide();
    });
    $('.dia').on('click',function(){
        $('#dialog .dialog_img').attr('src',$(this).prev('img').attr('src'));
        if($(this).width() > $(this).height())
            $('#dialog .dialog_img').css({top:'20%'});
        else
            $('#dialog .dialog_img').css({bottom:0});
            
        $('#dialog').show();
    });
});