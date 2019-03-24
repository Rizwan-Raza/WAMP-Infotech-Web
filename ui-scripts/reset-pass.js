$(document).ready(function () {
    $("#reset-form form").submit(e => {

        e.preventDefault();

        if (e.target.password.value != e.target.rrp_password.value) {
            M.toast({
                html: 'Password Mismatch!'
            });
            e.target.password.focus();
            return;
        }

        $.ajax({
            url: "php/reset-password.php" + window.location.search,
            method: "POST",
            data: $(e.target).serialize(),
            beforeSend: () => {
                $("#reset-form #progress, #reset-form .prevent-overlay").removeClass("hide");
            },
            success: (data, status) => {
                var object = JSON.parse(data);
                M.toast({
                    html: object.message
                });
                if (object.status == "pass_error") {
                    e.target.password.focus();
                    return;
                } else if (object.status == "success") {
                    e.target.reset();
                    M.toast({
                        html: "Redirecting to Sign in ..."
                    });
                    setTimeout(() => {
                        window.location.href = 'signin';
                    }, 3000);
                }
            },
            error: (data, status) => {
                M.toast({
                    html: data
                });
                console.log(data, status);
            },
            complete: () => {
                $("#reset-form #progress, #reset-form .prevent-overlay").addClass("hide");
            }
        });
    });
});