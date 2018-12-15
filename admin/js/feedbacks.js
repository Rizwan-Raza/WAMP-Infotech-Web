function approve(_fid, child, act) {
    // console.log(_uid, elem, data);
    elem = $(child).closest("tr");
    $.ajax({
        url: "admin/php/approve.php",
        method: "POST",
        data: {
            fid: _fid,
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
                $(child).attr("onclick", "activate(" + _fid + ", this, " + (act ? 0 : 1) + ")");
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

function deleteFeed(_fid, elem) {
    elem = $(elem).closest("tr");
    $.ajax({
        url: "admin/php/delete-feed.php",
        method: "POST",
        data: {
            _fid: _fid
        },
        beforeSend: () => {
            elem.css("opacity", 0.2);
            // $("#progress, .prevent-overlay").removeClass("hide");
        },
        success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
                html: object.message
            });
            if (object.status == "server_error") {
                elem.css("opacity", 0.5);
                return;
            } else if (object.status == "success") {
                elem.slideUp();
            }
        },
        error: (data, status) => {
            console.log(data, status);
        },
        complete: () => {
            // $("#progress, .prevent-overlay").addClass("hide");
        }
    });
}