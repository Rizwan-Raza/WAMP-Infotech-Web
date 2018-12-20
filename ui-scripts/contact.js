$(document).ready(function () {
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
            M.toast({
               html: data
            });
            console.log(data, status);
         },
         complete: () => {
            $("#progress, .prevent-overlay").addClass("hide");
         }
      });
   });

});