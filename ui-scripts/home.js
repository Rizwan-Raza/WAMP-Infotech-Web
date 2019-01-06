$(document).ready(function () {
  $('.carousel.carousel-slider').carousel({
    indicators: true,
    fullWidth: true
  });

  // $('.carousel.carousel-slider').slider({
  //   fullWidth: true
  // });

  $('.tap-target').tapTarget('open');

  var toastHTML =
    '<span><i class="material-icons left">phone</i>Call Us: <a href="tel:+918376075908" class="fw-500">+91-8376075908</a></span><button class="btn-flat toast-action" onclick="M.Toast.dismissAll();"><i class="material-icons">close</i></button>';
  M.toast({
    html: toastHTML,
    displayLength: 5000,
    classes: 'border-radius-4',
    completeCallback: () => {
      $(".fixed-action-btn").css("bottom", "23px");
    }
  });

  setTimeout(() => {
    $('.tap-target').tapTarget('close');
  }, 5000);

  var isPause = false;

  setInterval(() => {
    if (!isPause) {
      $('.carousel.carousel-slider').carousel("next");
    }
  }, 5000);

  $(".carousel.carousel-slider").mouseenter(() => {
    isPause = true;
  });

  $(".carousel.carousel-slider").mouseleave(() => {
    isPause = false;
  });

});