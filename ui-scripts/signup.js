$(document).ready(function () {
<<<<<<< HEAD
   $("#signup form").submit(e => {
      e.preventDefault();
      //  console.log($(e.target).serialize());

      if (e.target.password.value != e.target.r_password.value) {
         M.toast({
            html: 'Password Mismatch!'
         });
         e.target.password.focus();
         return;
      }

      $.ajax({
         url: "php/signup.php",
         method: "POST",
         data: $(e.target).serialize(),
         beforeSend: () => {
            $("#progress, .prevent-overlay").removeClass("hide");
         },
         success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
               html: object.message
            });

            if (object.status == "pass_error") {
               e.target.password.focus();
               return;
            } else if (object.status == "email_error") {
               e.target.email.focus();
               return;
            } else if (object.status == "success") {
               e.target.reset();
               window.location.href = "dashboard";
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

});
=======
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
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
