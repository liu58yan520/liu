$(function(){
    $('#top_menu').hide();
    var banner = new Swiper('#banner',{
        autoplay : 1,
        slidesPerView:'auto',
        loop:true,
        speed:2000,

    });
    setTimeout(function(){
        $('#center').fadeOut(1000);
        setTimeout(function(){
            var str='<span>&nbsp;&nbsp;Villa Design</span>';
            str+='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            str+='<em>Leader</em>';
             $('#center .tit').text('别墅设计 | 领导者');
             $('#center .sub_tit').html(str)
             $('#center').fadeIn(800)
         },1000);
         $('#bg').trigger('click');
    },2000)
    setTimeout(function(){
        $('#center').fadeOut(1000);
        setTimeout(function(){
            str='<span>Prime Case&nbsp;&nbsp;</span>';
            str+='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            str+='<em>Click View</em>';
            $('#center .sub_tit').html(str)
            $('#center .tit').text('精品案例 | 点击查看');
            $('#center').fadeIn(800)
            $('#center').on('click',function(){
                self:location='http://'+window.location.host+'/Mobile/Index/cases';
            });
         },1000)
    },5000)
    $('#bg').click(function(){
        if($('#top_menu').is(":hidden"))
             $('#top_menu').fadeIn(1200);
    });

    $('#top_menu .logo').attr('src',$('#top_menu .logo').attr('url')+'/logo_tou.png');


})