function deleteVisitor(_vid, elem) {
    elem = $(elem).closest("tr");
    $.ajax({
        url: "admin/php/delete-visitor.php",
        method: "POST",
        data: {
            _vid: _vid
        },
        beforeSend: () => {
            elem.css("opacity", 0.5);
        },
        success: (data, status) => {
            console.log(data, status);
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
            elem.css("opacity", 1);
            console.log(data, status);
        },
    });
}