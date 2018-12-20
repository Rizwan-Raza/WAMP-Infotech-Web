$(document).ready(function () {
    if (window.innerWidth <= 992) {
        $(".avatar-l").removeClass("avatar-l").addClass("avatar-m");
        if(window.innerWidth <=600) {
            $(".container.valign-wrapper").removeClass("valign-wrapper");
        }
    }

    $("#add-feed").submit(e => {
        e.preventDefault();
        // console.log(e.target.message.value);

        $.ajax({
            url: "php/feed.php",
            method: "POST",
            data: $(e.target).serialize(),
            beforeSend: () => {
                $("#add-feed #progress, #add-feed .prevent-overlay").removeClass("hide");
            },
            success: (data, status) => {
                // console.log(data, status);
                var object = JSON.parse(data);
                M.toast({
                    html: object.message
                });
                if (object.status == "success") {
                    $("#add_feed_modal").modal("close");
                    $(".grey .container.row").append(`<div class="col s12 m6">
                        <div class="card border-radius-8">
                            <div class="card-content">
                                <span class="card-title yellow-text text-darken-3"
                                        style="font-weight: 500">Not approved yet</span>
                                <p>
                                    ` + e.target.message.value + `
                                </p>
                            </div>
                            <div class="card-action grey-text text-darken-1 border-radius-8 ">
                                <span class="tooltipped" data-tooltip="Just now"><i
                                        class="material-icons left">access_time</i>
                                    Just now
                                </span>
                                <button class="transparent btn-flat right circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark"
                                    style="margin: -7px 0px" onclick="editFeed()" data-tooltip="Delete"><i class="material-icons black-text lh-5">delete</i></button>
                                <button class="transparent btn-flat right circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark"
                                    style="margin: -7px 0px" onclick="disableFeed()" data-tooltip="Edit"><i class="material-icons black-text lh-5">edit</i></button>
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
                $("#add-feed #progress, #add-feed .prevent-overlay").addClass("hide");
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


var content = "";

function editableFeed(_fid, elem) {
    $(elem).find("i").text("check");
    $(elem).attr("onclick", "editFeed(" + _fid + ", this)");
    elem = $(elem).closest(".col");
    var cont = elem.find("p");
    content = cont.text().trim();
    cont.after("<textarea class='materialize-textarea'>" + content + "</textarea>");
    cont.remove();
}

function editFeed(_fid, child) {
    elem = $(child).closest(".col");
    $.ajax({
        url: "php/edit-feed.php",
        method: "POST",
        data: {
            _fid: _fid,
            message: $(elem).find("textarea").val()
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
            textf.after("<p>" + content + "</p>");
            textf.remove();
            if (object.status == "success") {
                elem.find("p").text(textf.val().trim());
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