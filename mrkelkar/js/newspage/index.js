$(window).load(function() {

   $('.post-module').hover(function() {
   $(this).css( 'cursor', 'pointer' );
   });
  $('.post-module').on('click', function () {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);

  });
});
