function openWork(title, url, desc, image) {
    $("#work_modal .card-title").text(title);
    $("#work_modal p").text(desc);
    $("#work_modal .card-image img").attr("src", image);
    $("#work_modal .card-image img").attr("alt", title);
    $("#work_modal .btn-floating").attr("href", url);
    $("#work_modal").modal("open");
}