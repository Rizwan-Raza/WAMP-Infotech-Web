$(document).ready(function () {
    M.AutoInit();
    $("#a_signin form").submit(e => {
        e.preventDefault();
        //  console.log($(e.target).serialize());

        $.ajax({
            url: "admin/php/signin.php",
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
                } else if (object.status == "server_error") {
                    return;
                } else if (object.status == "success") {
                    e.target.reset();
                    // Get ??
                    let params = (new URL(document.location)).searchParams;
                    let name = params.get("redirect_to");
                    window.location.href = name ? name : "admin";
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

    $(".row .m9").click(() => {
        if (window.innerWidth <= 600) {
            $(".sidenav").css("transform", "matrix(1, 0, 0, 1, -300, 0)");
        }
    });

});


function signout() {
    $.ajax({
        url: "admin/php/signout.php",
        method: "GET",
        success: (data, status) => {
            // console.log(data, status);
            window.location.href = "admin";
        }
    });
}

function toggleNav() {
    if (window.innerWidth > 600) {
        if ($("section.row .col.m3").width() != 0) {
            $("section.row .col.m3").animate({
                width: 0
            });
            $("section.row .col.m9").animate({
                width: '100%'
            });
        } else {
            $("section.row .col.m9").animate({
                width: '75%'
            });
            $("section.row .col.m3").animate({
                width: '25%'
            });

        }
    } else {
        let elem = $(".sidenav");
        // console.log(elem.css("transform"));

        if (elem.css("transform") == "matrix(1, 0, 0, 1, -300, 0)") {
            elem.css("transform", "matrix(1, 0, 0, 1, 0, 0)");
        } else {
            elem.css("transform", "translateX(-100%)");
        }
    }
}