$(document).ready(function() {
  if (window.matchMedia("(max-width: 767px)").matches || window.matchMedia("(max-height: 767px)").matches ) {
    $(".modal-button").attr("disabled", true);
  }
  if (window.matchMedia("(min-width: 768px)").matches && window.matchMedia("(min-height: 768px)").matches ) {
    $(".ewic-slider").each(function( index ) {
      $(this).attr("data-toggle", "modal");
      $(this).attr("data-target", "#slide_" + index);
      var slide_img = $("img", this);
      var fullurl = slide_img.attr("src");
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
    });
  }
  $(".modal").on("show.bs.modal", function (e) {
    $("img", this).attr("src", $(this).data("fullsize"));
  });
});
