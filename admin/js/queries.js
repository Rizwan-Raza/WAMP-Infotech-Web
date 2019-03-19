$(() => {
    M.AutoInit();
});

function deleteQuery(_qid, elem) {
    elem = $(elem).closest("tr");
    $.ajax({
        url: "admin/php/delete-query.php",
        method: "POST",
        data: {
            _qid: _qid
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
            if (object.status == "server_error") {
                elem.css("opacity", 1);
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


function openQuery(name, msg) {
    $("#queryModal h4").text(name);
    $("#queryModal p").text(msg);
    $(".modal").modal('open');
}