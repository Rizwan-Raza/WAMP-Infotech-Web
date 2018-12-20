$(document).ready(function () {
    let params = (new URL(document.location)).searchParams;
    let activation = params.get("activation");
    if (activation != null && activation != undefined && activation.length != 0) {
        let data = "Something went wrong.";
        switch (activation) {
            case "illegal_access":
                data = "Illegal Access, Missing parameters";
                break;
            case "wrong_url":
                data = "Wrong Activation URL, mismatch hash.";
                break;
            case "success":
                data = "User activated successfully. Login";
                break;
            default:
                data = "Something went wrong.";
        }
        M.toast({
            html: data,
            displayLength: 5000,
            classes: 'border-radius-4'
        });
    }

    $("#signin form").submit(e => {
        e.preventDefault();
        //  console.log($(e.target).serialize());

        $.ajax({
            url: "php/signin.php",
            method: "POST",
            data: $(e.target).serialize(),
            beforeSend: () => {
                $("#signin #progress, #signin .prevent-overlay").removeClass("hide");
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
                $("#signin #progress, #signin .prevent-overlay").addClass("hide");
            }
        });
    });

});