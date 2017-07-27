$(function(){
    var banner = new Swiper('#banner',{
        pagination: '.swiper-pagination',
        paginationClickable: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoplay : 1500,
        loop:true,
        autoHeight:true,
    });

    $('#main figure').on('click',function(){
        self:location='cases';
    });

});