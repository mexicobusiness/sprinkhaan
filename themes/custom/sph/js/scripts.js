(function ($) {
  $(document).ready(function () {


    $("#block-sph-svgimagelogo img").wrap('<a href="/"></a>');

   
    $('a[href^="#"]').on('click', function (e) {
      e.preventDefault();
      var target = $(this.getAttribute('href'));
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
      }
    });

  });
})(jQuery);
document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.getElementById('hamburger-menu');
  const mobileMenu = document.getElementById('mobile-menu');
  const navegacionPrincipal = document.getElementById('block-sph-navegacionprincipal');
  const languageSwitcher = document.getElementById('block-sph-languageswitcher');
  
  hamburger.addEventListener('click', function() {
    this.classList.toggle('open');
    mobileMenu.classList.toggle('open');
    
    if (mobileMenu.classList.contains('open')) {
    
      setTimeout(() => {
        navegacionPrincipal.classList.add('visible');
      }, 100);
      

      setTimeout(() => {
        languageSwitcher.classList.add('visible');
      }, 200);
    } else {
      navegacionPrincipal.classList.remove('visible');
      languageSwitcher.classList.remove('visible');
    }
  });
});
