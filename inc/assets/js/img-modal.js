$(document).ready(function() {
  $('.modal').on('show.bs.modal', function (e) {
    $("img", this).attr("src", $(this).data("url"));
})
});
