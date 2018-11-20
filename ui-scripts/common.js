$(document).ready(() => {
  if (window.innerWidth <= 992) {
    $("div.aboutDropDownContainer").remove();
    $("div.serviceDropDownContainer").remove();
    $(".about-mobile-drop").addClass("aboutDropDownContainer");
    $(".service-mobile-drop").addClass("serviceDropDownContainer");
    $(".modal").addClass("modal-fixed-footer");
    if (window.innerWidth <= 600) {
      $(".fixed-action-btn").css("bottom", "79px");
    }
  }

  // Initialition of all Materilize Services;
  M.AutoInit();

  var toastHTML =
    '<span><i class="material-icons left">phone</i>Call Us: <a href="tel:+918376075908" class="fw-500">+91-8376075908</a></span><button class="btn-flat toast-action" onclick="M.Toast.dismissAll();"><i class="material-icons">close</i></button>';
  M.toast({
    html: toastHTML,
    displayLength: 5000,
    completeCallback: () => {
      $(".fixed-action-btn").css("bottom", "23px");
    }
  });

  $("textarea#message").characterCounter();

  var aboutDrop = $(".about.dropdown-trigger").dropdown({
    hover: true,
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick: false,
    container: $(".aboutDropDownContainer")
  });

  var serviceDrop = $(".service.dropdown-trigger").dropdown({
    hover: true,
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick: false,
    container: $(".serviceDropDownContainer")
  });

  $(".about.dropdown-trigger").click(() => {
    M.Dropdown.getInstance(aboutDrop).open();
  });
  $(".service.dropdown-trigger").click(() => {
    M.Dropdown.getInstance(serviceDrop).open();
  });

  $(".scrollable").scroll(() => {
    var qq = $("#quick_query");
    var container = $(".scrollable");
    if (
      container.scrollTop() + container.height() >
      container.get(0).scrollHeight - 100
    ) {
      if (qq.find("i.material-icons").text() != "arrow_upward") {
        qq.addClass("scale-out");
        setTimeout(() => {
          qq.find("i.material-icons").text("arrow_upward");
          qq.removeClass("scale-out modal-trigger");
          qq.removeAttr("data-target");
          qq.click(() => {
            container.click();
            container.animate(
              {
                scrollTop: 0
              },
              container.get(0).scrollHeight / 10
            );
          });
        }, 200);
      }
    } else {
      if (qq.find("i.material-icons").text() == "arrow_upward") {
        qq.addClass("scale-out modal-trigger");
        qq.attr("data-target", "quick_query_modal");
        qq.unbind("click");
        setTimeout(() => {
          qq.find("i.material-icons").text("edit");
          qq.removeClass("scale-out");
        }, 200);
      }
      // qq.find("i.material-icons").text("edit");
    }
  });

  $("#qq").submit(e => {
    e.preventDefault();
    $("#loader").removeClass("hide");
    $(e.target).addClass("hide");

    console.log($(e.target).serialize());
    // $.ajax({
    //     url: "abhi-pta-nahi",
    //     method: "POST",
    //     data: $(e.target).serialize()
    // });
  });
});
