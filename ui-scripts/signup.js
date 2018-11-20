$(document).ready(function () {
 $("#signup form").submit(e => {
    e.preventDefault();
    $("#s_loader").removeClass("hide");

    console.log($(e.target).serialize());
    // $.ajax({
    //     url: "abhi-pta-nahi",
    //     method: "POST",
    //     data: $(e.target).serialize()
    // });
 });
 
});