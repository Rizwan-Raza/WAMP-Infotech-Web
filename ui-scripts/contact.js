$(document).ready(function () {
 $("#contact form").submit(e => {
    e.preventDefault();
    $("#c_loader").removeClass("hide");

    console.log($(e.target).serialize());
    // $.ajax({
    //     url: "abhi-pta-nahi",
    //     method: "POST",
    //     data: $(e.target).serialize()
    // });
 });
 
});