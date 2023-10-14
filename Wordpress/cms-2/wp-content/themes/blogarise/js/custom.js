(function($) {
  "use strict";
/* =================================
===        home -slider        ====
=================================== */
function homemain() {
  var homemain = new Swiper('.homemain', {
    direction: 'horizontal',
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },

  });              
}
homemain(); 
/* =================================
===        marquee       ====
=================================== */
function marquee() {
  jQuery('.marquee').marquee({
  speed: 50,
  direction: 'left', 
  delayBeforeStart: 0,
  duplicated: true,
  pauseOnHover: true,
  startVisible: true
  });
}
marquee();
/* =================================
===         SCROLL TOP       ====
=================================== */
jQuery(".bs_upscr").hide(); 
function taupr() {
  jQuery(window).on('scroll', function() {
    if ($(this).scrollTop() > 500) {
        $('.bs_upscr').fadeIn();
    } else {
      $('.bs_upscr').fadeOut();
    }
  });   
  $('a.bs_upscr').on('click', function()  {
    $('body,html').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
}    
taupr();
})(jQuery);