<script>
$(document).ready(function(){$('.carousel.carousel-slider').carousel({indicators:!0,fullWidth:!0}),$('.tap-target').tapTarget('open');M.toast({html:'<span><i class="material-icons left">phone</i>Call Us: <a href="tel:+918376075908" class="fw-500">+91-8376075908</a></span><button class="btn-flat toast-action" onclick="M.Toast.dismissAll();"><i class="material-icons">close</i></button>',displayLength:5e3,classes:'border-radius-4',completeCallback:()=>{$('.fixed-action-btn').css('bottom','23px')}}),setTimeout(()=>{$('.tap-target').tapTarget('close')},5e3);var b=!1;setInterval(()=>{b||$('.carousel.carousel-slider').carousel('next')},5e3),$('.carousel.carousel-slider').mouseenter(()=>{b=!0}),$('.carousel.carousel-slider').mouseleave(()=>{b=!1})});
</script>