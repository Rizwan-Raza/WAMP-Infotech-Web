$(() => {
    $("#confirm_pass").submit(e => {
        e.preventDefault();
        $.ajax({
            url: "php/confirm-pass.php?is_admin=true",
            method: "POST",
            data: $(e.target).serialize(),
            beforeSend: () => {
                $("#confirm_modal #progress, #confirm_modal .prevent-overlay").removeClass("hide");
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
                } else if (object.status == "success") {
                    e.target.reset();
                    $("#confirm_modal").modal("close");
                    $("#settings").trigger("submit");
                }
            },
            error: (data, status) => {
                console.log(data, status);
            },
            complete: () => {
                $("#confirm_modal #progress, #confirm_modal .prevent-overlay").addClass("hide");
            }
        });
    });

    $("#settings").submit(e => {
        e.preventDefault();
        $.ajax({
            url: "admin/php/update.php",
            method: "POST",
            data: $(e.target).serialize(),
            beforeSend: () => {
                $("#userInfo #progress, #userInfo .prevent-overlay").removeClass("hide");
            },
            success: (data, status) => {
                // console.log(data, status);
                var object = JSON.parse(data);
                M.toast({
                    html: object.message
                });

                if (object.status == "username_error") {
                    e.target.username.focus();
                    return;
                }
            },
            error: (data, status) => {
                console.log(data, status);
            },
            complete: () => {
                $("#userInfo #progress, #userInfo .prevent-overlay").addClass("hide");
            }
        });
    });
});