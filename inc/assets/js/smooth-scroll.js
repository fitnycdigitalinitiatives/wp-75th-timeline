$(document).ready(function() {
  //Scroll animation and offset
  $('a.scroll-link').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top + 0.5)
      });
      event.preventDefault();
  });
});
