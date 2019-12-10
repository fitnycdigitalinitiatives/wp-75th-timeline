$(document).ready(function() {
  //Fullscreen fix for mobile browsers
  // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
  var initialHeight = window.innerHeight
  let vh = initialHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', `${vh}px`);
  document.getElementById("landing").style.minHeight = "calc((var(--vh, 1vh) * 100) - (56px + 48px))";

  var id;
  $(window).resize(function() {
      clearTimeout(id);
      id = setTimeout(doneResizing, 500);
  });

  function doneResizing(){
    var currentHeight = window.innerHeight;
    if (((currentHeight - initialHeight) > 200) || ((currentHeight - initialHeight) < -200)) {
      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
    initialHeight = currentHeight;
  }
});
