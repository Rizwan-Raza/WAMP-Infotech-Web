$(document).ready(function () {
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
            $("#signup #progress, #signup .prevent-overlay").removeClass("hide");
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
               let params = (new URL(document.location)).searchParams;
               let name = params.get("redirect_to");
               window.location.href = name ? name : "dashboard";
            }
         },
         error: (data, status) => {
            M.toast({
               html: data
            });
            console.log(data, status);
         },
         complete: () => {
            $("#signup #progress, #signup .prevent-overlay").addClass("hide");
         }
      });
   });

});