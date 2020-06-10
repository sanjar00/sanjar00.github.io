$(function(){
    $('a[href^="#"]').click(function (){
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    });
    
    times = function(){         
        now = new Date();  
        hour = 24-now.getHours();
        hour = ((hour+'').length==1?hour='0'+hour:hour)+'';
        minu = 60-now.getMinutes();
        minu = ((minu+'').length==1?minu='0'+minu:minu)+'';
        secu = 60-now.getSeconds(); 
        secu = ((secu+'').length==1?secu='0'+secu:secu)+'';
        $('.timer-action').html('<span class="timer-col"><strong>'+hour+'</strong><br/><span>Soat</span></span><span class="timer-col"><strong>'+minu+'</strong><br/><span>Daqiqa</span></span><span class="timer-col"><strong>'+secu+'</strong><br/><span>Sonia</span></span>');
    }   
    times();                                              
    setInterval(times,1000);
    
    $('.slider-cont').slick({
      infinite: true,
      autoplay: true,
      autoplaySpeed: 3000,
      adaptiveHeight: false,
      dots: false,
      arrows: true,
      fade: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<span data-role="none" class="slick-prev animate" aria-label="Previous" tabindex="0" role="button"></span>',
      nextArrow: '<span data-role="none" class="slick-next animate" aria-label="Next" tabindex="0" role="button"></span>'
    });  

});
 