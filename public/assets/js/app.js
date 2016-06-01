$(function(){
  $(".content").desktop({
    /* this will manage normal requests after render operations */
    'controllers' : {
      landing : {
        init : function(){
          var typed = [];
          $('.page-title').hide();$('.page-bg').hide();
          $('.index-caption').each(function(){
            typed.push($(this).text());
          });
          $('.page-caption').typed({
            strings: typed,
            typeSpeed: 0,
            startDelay: 500,
            backDelay: 3000,
            preStringTyped: function(i){
              $('.page-bg').fadeOut(500, function(){
                $(this).eq(i).fadeIn(1000,function(){
                  $('.page-title').hide();
                  $('.page-title').eq(i).fadeIn(1000);  
                });
              });
            }
          });
        }
      }
    },
    /* this will manage form requests after render operations */
    'forms' : {
      login : function(response){
        if( ! response.result){
          $('.alert-danger')
            .html("Username and/or password are incorrect")
            .removeClass("hide")
            .hide()
            .slideDown();
        }
      }
    },
    'transition' : 'fade',
    'transition-speed' : 300
  });

  if($('.slick-dotted').length){
    $('.slick-dotted').slick({    
      dots: true,
      infinite: true,
      speed: 450,
      pauseOnHover: false,
      autoplaySpeed: 8000,
      autoplay:true,
      arrows: false,
      fade: true
    });
  }


  $(window).scroll(function() {  
    clearTimeout($.data(this, 'timer'));
    $this = $(this);
    $.data(this, 'timer', setTimeout(function() {
      if($(this).scrollTop() > 100){
        if($('.navbar').hasClass('nav-fixed-idle')){
          $('.navbar').removeClass('nav-fixed-idle').addClass('nav-fixed-ready');
        }
      } else {
        if($('.navbar').hasClass('nav-fixed-ready')){
          $('.navbar').removeClass('nav-fixed-ready').addClass('nav-fixed-idle');
        }
      }
    }, 300));
  });

  $('[data-toggle="tooltip"]').tooltip({container: 'body'});
  $('[data-toggle="popover"]').popover();
});