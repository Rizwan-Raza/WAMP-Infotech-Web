$(document).ready(function () {
    $('.carousel').carousel({
        dist: 0,
        padding: 80,
        numVisible: 4
    });
    autoplay();

    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }
});