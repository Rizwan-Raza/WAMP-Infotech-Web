$(document).ready(function () {
<<<<<<< HEAD
   $("#contact form").submit(e => {
      e.preventDefault();
      $("#progress, .prevent-overlay").removeClass("hide");

      $.ajax({
         url: "php/contact.php",
         method: "POST",
         data: $(e.target).serialize(),
         success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
               html: object.message
            });
            if (object.status == "server_error") {
               return;
            }
         },
         error: (data, status) => {
            console.log(data, status);
         },
         complete: () => {
            $("#progress, .prevent-overlay").addClass("hide");
         }
      });
   });

=======
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
 
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
});