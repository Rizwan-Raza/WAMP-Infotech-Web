$(document).ready(function () {
 $("#login form").submit(e => {
    e.preventDefault();
    $("#l_loader").removeClass("hide");

    console.log($(e.target).serialize());
    // $.ajax({
    //     url: "abhi-pta-nahi",
    //     method: "POST",
    //     data: $(e.target).serialize()
    // });
 });
 
});