$(document).ready(function () {
  $('.carousel.carousel-slider').carousel({
<<<<<<< HEAD
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

  var slide = () => {
    $('.carousel.carousel-slider').carousel("next");
  };

  var carousel = setInterval(slide, 5000);

  $(".carousel.carousel-slider").mouseenter(() => {
    clearInterval(carousel);
  });

  $(".carousel.carousel-slider").mouseleave(() => {
    setInterval(slide, 5000);
  });
=======
    indicators: true
  });

  $('.tap-target').tapTarget('open');

  // var elems = document.querySelectorAll('.tap-target');
  // var instances = M.TapTarget.init(elems, {});
  setTimeout(() => {
    $('.tap-target').tapTarget('close');
  }, 5000); 
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076

});