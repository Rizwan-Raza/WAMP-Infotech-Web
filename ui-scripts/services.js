$(document).ready(function () {
    $('.carousel').carousel({
        dist: -200,
        padding: 200,
        numVisible: 5
    });
    autoplay();

    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }
});