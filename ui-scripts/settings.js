var currentTargetToOpen = null;
$(document).ready(function () {
    $("#confirm_pass").submit(e => {
        console.log(currentTargetToOpen);
        e.preventDefault();
        $.ajax({
            url: "php/confirm-pass.php",
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
                    if (currentTargetToOpen == "#settings") {
                        $("#settings").trigger("submit");
                    } else {
                        disableUser();
                    }
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
            url: "php/update.php",
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

    $("#file-upload").submit(e => {
        e.preventDefault();

        $.ajax({
            url: "php/pic-upload.php",
            contentType: false,
            processData: false,
            method: "POST",
            type: "POST",
            data: new FormData(e.target),
            beforeSend: () => {
                $("#apply-upload").addClass("hide");
                $(".avatar-l #progress, .avatar-l .prevent-overlay").removeClass("hide");
            },
            success: (data, status) => {
                // console.log(data, status);
                var object = JSON.parse(data);
                M.toast({
                    html: object.message
                });
            },
            error: (data, status) => {
                console.log(data, status);
            },
            complete: () => {
                $(".avatar-l #progress, .avatar-l .prevent-overlay").addClass("hide");
            }
        });
    });

});

function disableUser() {
    $.ajax({
        url: "php/disable.php",
        method: "POST",
        beforeSend: () => {
            $("#delete #progress, #delete .prevent-overlay").removeClass("hide");
        },
        success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
                html: object.message
            });

            if (object.status == "success") {
                setTimeout(() => {
                    M.toast({
                        html: object.message
                    });
                }, 3000);
                return;
            }
        },
        error: (data, status) => {
            console.log(data, status);
        },
        complete: () => {
            $("#delete #progress, #delete .prevent-overlay").addClass("hide");
        }
    });
}


function readURL(input, query, indicator) {
    var files = !!input.files ? input.files : [];
    if (!files.length || !window.FileReader) return;
    if (/^image/.test(files[0].type)) {
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);
        reader.onloadend = function () {
            $(query).attr("src", this.result);
            $(indicator).removeClass("hide");
        }
    }
}