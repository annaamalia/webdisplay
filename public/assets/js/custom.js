//Card
  $(document).ready(function() {
  $("#myCarouselCard").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $("#myCarouselCard .carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $("#myCarouselCard .carousel-item")
            .eq(i)
            .appendTo("#myCarouselCard .carousel-inner-multi");
        } else {
          $("#myCarouselCard .carousel-inner-multi .carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner-multi1"));
        }
      }
    }
  });
});

  $(document).ready(function() {
  $("#myCarouselCard2").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $("#myCarouselCard2 .carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $("#myCarouselCard2 .carousel-item")
            .eq(i)
            .appendTo("#myCarouselCard2 .carousel-inner-multi2");
        } else {
          $("#myCarouselCard2 .carousel-inner-multi .carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner-multi2"));
        }
      }
    }
  });
});

  $(document).ready(function() {
  $("#myCarouselLogo").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 6;
    var totalItems = $("#myCarouselLogo .carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $("#myCarouselLogo .carousel-item")
            .eq(i)
            .appendTo("#myCarouselLogo .carousel-inner-logo");
        } else {
          $("#myCarouselLogo .carousel-inner-logo .carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner-logo"));
        }
      }
    }
  });
});


//Progress bar
var delay = 500;
$(".progress-bar").each(function(i){
    $(this).delay( delay*i ).animate( { width: $(this).attr('aria-valuenow') + '%' }, delay );

    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: delay,
        easing: 'swing'
    });
});


setTimeout(function(){        
    $('.giftunggu').delay(0).fadeOut('slow'); 
}, 1000);
              new WOW().init();
// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 100) {        // If page is scrolled more than 100px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});