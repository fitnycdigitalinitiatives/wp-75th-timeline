$(document).ready(function() {
  //Fullscreen fix for mobile browsers
  // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
  var initialinnerHeight = window.innerHeight;
  var initialouterHeight = window.outerHeight;
  let vh = initialinnerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', `${vh}px`);
  document.getElementById("landing").style.minHeight = "calc((var(--vh, 1vh) * 100) - (56px + 48px))";

  var id;
  $(window).resize(function() {
    var currentinnerHeight = window.innerHeight;
    var currentouterHeight = window.outerHeight;
    // Only trigger a change if the outer height changes
    if (currentouterHeight != initialouterHeight) {
      let vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty('--vh', `${vh}px`);
    }
    initialouterHeight = currentouterHeight;
  });
  // end fullscreen fix

  //Scroll animation and offset
  $('a.scroll-link').on("click", function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top + 0.5)
      });
      event.preventDefault();
  });
  // end scroll animation

  // image modals, check theme variable first to see if active
  if (theme_var.imagePop == 'Yes') {
    if (window.matchMedia("(max-width: 767px)").matches || window.matchMedia("(max-height: 767px)").matches ) {
      $(".modal-button").attr("disabled", true);
    }
    if (window.matchMedia("(min-width: 768px)").matches && window.matchMedia("(min-height: 768px)").matches ) {
      $(".ewic-slider").each(function( index ) {
        $(this).attr("data-toggle", "modal");
        $(this).attr("data-target", "#slide_" + index);
        var slide_img = $("img", this);
        if (slide_img.data("full")) {
          var fullurl = slide_img.data("full");
        } else {
          var fullurl = slide_img.attr("src");
        }
        if (slide_img.parent().is("a")) {
          slide_img.unwrap();
        }
        var caption = $(".flex-caption", this).text();
        var modal = `
        <div class="modal fade" id="slide_` + index + `" data-fullsize="` + fullurl + `" tabindex="-1" role="dialog" aria-label="` + caption + `" aria-hidden="true" data-backdrop="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <img alt="` + caption + `">
                        </div>
                      </div>
                    </div>
                  </div>
        `;
        $(this).append( modal );
        $(this).css("cursor", "pointer");
      });
    }
    $(".modal").on("show.bs.modal", function (e) {
      $("img", this).attr("src", $(this).data("fullsize"));
    });
  }
  // image modal end

  // load YouTube iframe
  $('.play-button').on("click", function(event) {
    var youtube_id = $(this).parent().data("youtube-id");
    var iframe = `
    <iframe width="560" height="315" src="https://www.youtube.com/embed/` + youtube_id + `" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    `;
    $(this).parent().html(iframe);
  });
  // Fade out loading animation after 3 seconds or if page loads first
  setTimeout(function(){
    $(".pre-loader").fadeOut("slow", function() {
    });
  }, 3000);
});

$(window).on("load",function(){
  // Fade out loading animation and update screen reader text
  $(".pre-loader").fadeOut("slow", function() {
    $(".pre-loader .sr-only").text("Page is loaded.");
  });
});
