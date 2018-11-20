$(document).ready(function () {
  $('.carousel.carousel-slider').carousel({
    indicators: true
  });

  $('.tap-target').tapTarget('open');

  // var elems = document.querySelectorAll('.tap-target');
  // var instances = M.TapTarget.init(elems, {});
  setTimeout(() => {
    $('.tap-target').tapTarget('close');
  }, 5000); 

});