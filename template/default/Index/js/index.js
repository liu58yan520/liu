$(function(){
    var banner = new Swiper('#banner',{
        autoplay : 1500,
        speed:1600,
        loop:true,
        autoHeight:true,
        effect : 'fade',
    });
    setTimeout(function(){
        $('#center').fadeOut(1000);
        setTimeout(function(){
             $('#center a').text('别墅设计 | 领导者')
             $('#center').fadeIn(800);
         },1000);
    },2000)
    setTimeout(function(){
        $('#center').fadeOut(1000);
        setTimeout(function(){
            $('#bg').trigger('click');
            $('#center a').text('精品案例 | 点击查看').fadeIn(800);
            $('#center').fadeIn(800);
         },1000)
    },5000)
    $('#bg').click(function(){
        if($('#top_menu').is(":hidden"))
             $('#top_menu').slideDown(300);
    });


})