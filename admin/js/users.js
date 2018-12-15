$(() => {
    // $("tr").hover(e=>{
    //     console.log(e);
    // });
});

function activate(_uid, child, act) {
    // console.log(_uid, elem, data);
    elem = $(child).closest("tr");
    $.ajax({
        url: "admin/php/activate.php",
        method: "POST",
        data: {
            uid: _uid,
            act: act
        },
        beforeSend: () => {
            elem.css("opacity", 0.5);
            // $("#progress, .prevent-overlay").removeClass("hide");
        },
        success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
                html: object.message
            });
            if (object.status == "success") {
                let icon = $(child).find("i");
                icon.text(act ? "close" : "check");
                if (icon.hasClass("green-text")) {
                    icon.removeClass("green-text");
                    icon.addClass("red-text");
                } else {
                    icon.removeClass("red-text");
                    icon.addClass("green-text");
                }
                $(child).closest(".pos-rel").find(".pos-abs>i").text(act ? "check" : "close");
                $(child).attr("onclick", "activate(" + _uid + ", this, " + (act ? 0 : 1) + ")");
                $(child).attr("data-tooltip", act ? "Deactivate" : "Activate");
                // console.log(child);
            }
        },
        error: (data, status) => {
            console.log(data, status);
        },
        complete: () => {
            elem.css("opacity", 1);
        }
    });
}