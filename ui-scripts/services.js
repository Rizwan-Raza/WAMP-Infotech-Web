$(document).ready(function () {
    $("#marketing-tabs").tabs({
        swipeable: true
    });
    if ($(".tabs-content").length != 0) {
        $(".tabs-content").height(($(".tabs-content").get(0).scrollHeight));
    }
});