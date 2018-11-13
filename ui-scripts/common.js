$(document).ready(function () {
    if (window.innerWidth <= 992) {
        $("div.aboutDropDownContainer").remove();
        $("div.serviceDropDownContainer").remove();
        $(".about-mobile-drop").addClass("aboutDropDownContainer");
        $(".service-mobile-drop").addClass("serviceDropDownContainer");
        $(".modal").addClass("modal-fixed-footer");
    }

    // Initialition of all Materilize Services;
    M.AutoInit();

    $('.tap-target').tapTarget('open');


    $('textarea#message').characterCounter();


    $(".about.dropdown-trigger").dropdown({
        hover: false,
        constrainWidth: false,
        coverTrigger: false,
        container: $(".aboutDropDownContainer")
    });

    $(".service.dropdown-trigger").dropdown({
        hover: false,
        constrainWidth: false,
        coverTrigger: false,
        container: $(".serviceDropDownContainer")
    });

    $(document).click((event) => {
        $(".dropdown-trigger i.material-icons.right").text("expand_more");
        if ($(event.target).hasClass("dropdown-trigger")) {
            if ($(event.target).hasClass("about")) {
                if ($("#about_dropdown").css("opacity") == 0) {
                    $(".about.dropdown-trigger i.material-icons.right").text("expand_less");
                }
            } else if ($(event.target).hasClass("service")) {
                if ($("#service_dropdown").css("opacity") == 0) {
                    $(".service.dropdown-trigger i.material-icons.right").text("expand_less");
                }
            }
        } 
    });
});