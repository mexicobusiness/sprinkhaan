;(function ($) {
  $(document).ready(function() {

    //Add link in logo
    $("#block-sph-svgimagelogo img").wrap('<a href="/"></a>');

    //Scroll Down
    $('a[href^="#"]').on('click', function(e) {
      e.preventDefault();
      var target = $(this.getAttribute('href'));
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
      }
    });

  });
})(jQuery)
