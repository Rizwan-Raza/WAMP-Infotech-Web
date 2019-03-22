$(document).ready(function () {
    if (window.innerWidth <= 992) {
        $(".avatar-l").removeClass("avatar-l").addClass("avatar-m");
        if (window.innerWidth <= 600) {
            $(".container.valign-wrapper").removeClass("valign-wrapper");
        }
    }

    $("#add-feed").submit(e => {
        e.preventDefault();
        let msg = e.target.message.value;
        let company = e.target.company.value;
        e.target.reset();

        $.ajax({
            url: "php/feed.php",
            method: "POST",
            data: $(e.target).serialize(),
            beforeSend: () => {
                $("#add_feed_modal #progress, #add_feed_modal .prevent-overlay").removeClass("hide");
            },
            success: (data, status) => {
                // console.log(data, status);
                var object = JSON.parse(data);
                M.toast({
                    html: object.message
                });
                if (object.status == "success") {
                    $("#add_feed_modal").modal("close");
                    $(".grey .container .row").append(`<div class="col s12 m6">
                        <div class="card border-radius-8">
                            <div class="card-content">
                                <span class="card-title yellow-text text-darken-3"
                                        style="font-weight: 500">Not approved yet</span>
                                <p class="msg">
                                ${msg}
                                </p>
                                <p class="align-right right">
                                 - From <b>${company}</b>
                                </p>
                            </div>
                            <div class="card-action grey-text text-darken-1 border-radius-8 ">
                                <span class="tooltipped" data-tooltip="Just now"><i
                                        class="material-icons left">access_time</i>
                                    Just now
                                </span>
                                <button class="transparent btn-flat right circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark"
                                    style="margin: -7px 0px" onclick="disableFeed(${object.fid},this)" data-tooltip="Delete"><i class="material-icons black-text lh-5">delete</i></button>
                                <button class="transparent btn-flat right circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark"
                                    style="margin: -7px 0px" onclick="editableFeed(${object.fid}, this)" data-tooltip="Edit"><i class="material-icons black-text lh-5">edit</i></button>
                            </div>
                        </div>
                    </div>`);
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
                $("#add_feed_modal #progress, #add_feed_modal .prevent-overlay").addClass("hide");
            }
        });
    });
});


function disableFeed(_fid, elem) {
    elem = $(elem).closest(".col");
    $.ajax({
        url: "php/disable-feed.php",
        method: "POST",
        data: {
            _fid: _fid
        },
        beforeSend: () => {
            $("#feed-" + _fid + " #progress, #feed-" + _fid + " .prevent-overlay").removeClass("hide");
        },
        success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
                html: object.message
            });
            if (object.status == "server_error") {
                return;
            } else if (object.status == "success") {
                elem.slideUp();
            }
        },
        error: (data, status) => {
            M.toast({
                html: data
            });
            console.log(data, status);
        },
        complete: () => {
            $("#feed-" + _fid + " #progress, #feed-" + _fid + " .prevent-overlay").addClass("hide");
        }
    });
}

function editableFeed(_fid, elem) {
    $(elem).find("i").text("check");
    $(elem).attr("onclick", "editFeed(" + _fid + ", this)");
    elem = $(elem).closest(".col");
    var cont = elem.find("p.msg");
    var comp = elem.find("p.right b");
    cont.after("<input id='company' name='company' value='" + comp.text().trim() + "'/>");
    cont.after("<textarea name='message' id='message' class='materialize-textarea'>" + cont.text().trim() + "</textarea>");
    M.textareaAutoResize($('.materialize-textarea'));
    cont.remove();
    comp.parents("p").remove();
}

function editFeed(_fid, child) {
    elem = $(child).closest(".col");
    $.ajax({
        url: "php/edit-feed.php",
        method: "POST",
        data: {
            _fid: _fid,
            message: elem.find("textarea").val().trim(),
            company: elem.find("input#company").val().trim()
        },
        beforeSend: () => {
            $("#feed-" + _fid + " #progress, #feed-" + _fid + " .prevent-overlay").removeClass("hide");
        },
        success: (data, status) => {
            // console.log(data, status);
            var object = JSON.parse(data);
            M.toast({
                html: object.message
            });
            $(child).find("i").text("edit");
            $(child).attr("onclick", "editableFeed(" + _fid + ", this)");
            var textf = elem.find("textarea");
            var texti = elem.find("input#company");
            textf.after("<p class='align-right right'> - From <b>" + texti.val().trim() + "</b></p>");
            textf.after("<p class='msg'>" + textf.val().trim() + "</p>");
            if (object.status == "success") {
                elem.find("p.msg").text(textf.val().trim());
                elem.find("p.right b").text(texti.val().trim());
            }
            textf.remove();
            texti.remove();
        },
        error: (data, status) => {
            M.toast({
                html: data
            });
            console.log(data, status);
        },
        complete: () => {
            $("#feed-" + _fid + " #progress, #feed-" + _fid + " .prevent-overlay").addClass("hide");
        }
    });

}

function toggleView(elem) {
    let icon = $(elem).find("i");
    if (icon.html() == "view_stream") {
        icon.html("view_module");
    } else {
        icon.html("view_stream");
    }
    $(".grey .row .col").toggleClass("m12");
    $(".grey .row .col").toggleClass("m6");
}