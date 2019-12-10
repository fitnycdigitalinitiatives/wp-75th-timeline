$(window).on("load",function(){
  // Animate loader off screen
  $(".pre-loader").fadeOut("slow", function() {
    $(".pre-loader .sr-only").text("Page is loaded.");
  });
});
