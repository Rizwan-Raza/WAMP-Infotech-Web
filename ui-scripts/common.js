$(document).ready(() => {
  if (window.innerWidth <= 992) {
    $("div.aboutDropDownContainer").remove();
    $("div.serviceDropDownContainer").remove();
<<<<<<< HEAD
    $("div.userDropDownContainer").remove();
    $(".about-mobile-drop").addClass("aboutDropDownContainer");
    $(".service-mobile-drop").addClass("serviceDropDownContainer");
    $(".user-mobile-drop").addClass("userDropDownContainer");
    $("#quick_query_modal").addClass("modal-fixed-footer");
    if (window.location.href.search("index") != -1 && window.innerWidth <= 600) {
=======
    $(".about-mobile-drop").addClass("aboutDropDownContainer");
    $(".service-mobile-drop").addClass("serviceDropDownContainer");
    $(".modal").addClass("modal-fixed-footer");
    if (window.innerWidth <= 600) {
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
      $(".fixed-action-btn").css("bottom", "79px");
    }
  }

<<<<<<< HEAD
  window.onload = () => {
    // setTimeout(() => {
    //   $("#page_loader").addClass("hide");
    // }, 3000);

    $("#page_loader").addClass("hide");
  }

  // Initialition of all Materilize Services;
  M.AutoInit();

=======
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
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076

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

<<<<<<< HEAD
  $(".user.dropdown-trigger").dropdown({
    hover: false,
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick: true,
    container: $(".userDropDownContainer")
  });

  $(".about.dropdown-trigger").click(() => {
    M.Dropdown.getInstance(aboutDrop).open();
  });

=======
  $(".about.dropdown-trigger").click(() => {
    M.Dropdown.getInstance(aboutDrop).open();
  });
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
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
<<<<<<< HEAD
            container.animate({
=======
            container.animate(
              {
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
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
<<<<<<< HEAD
          qq.find("i.material-icons").text("email");
          qq.removeClass("scale-out");
        }, 200);
      }
      // qq.find("i.material-icons").text("email");
=======
          qq.find("i.material-icons").text("edit");
          qq.removeClass("scale-out");
        }, 200);
      }
      // qq.find("i.material-icons").text("edit");
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
    }
  });

  $("#qq").submit(e => {
    e.preventDefault();
<<<<<<< HEAD
    $("#quick_query_modal #progress, #quick_query_modal .prevent-overlay").removeClass("hide");

    // console.log($(e.target).serialize());
    $.ajax({
      url: "php/contact.php",
      method: "POST",
      data: $(e.target).serialize(),
      success: (data, status) => {
        // console.log(data, status);
        var object = JSON.parse(data);
        M.toast({
          html: object.message
        });
        if (object.status == "server_error") {
          return;
        }
        $("#quick_query_modal").modal("close");
      },
      error: (data, status) => {
        console.log(data, status);
      },
      complete: () => {
        $("#quick_query_modal #progress,#quick_query_modal .prevent-overlay").addClass("hide");
      }
    });
  });

  $("#subscription-form").submit(e => {
    e.preventDefault();
    $("#footer #progress, #footer .prevent-overlay").removeClass("hide");

    // console.log($(e.target).serialize());
    $.ajax({
      url: "php/subscription.php",
      method: "POST",
      data: $(e.target).serialize(),
      success: (data, status) => {
        // console.log(data, status);
        var object = JSON.parse(data);
        M.toast({
          html: object.message
        });
      },
      error: (data, status) => {
        console.log(data, status);
      },
      complete: () => {
        $("#footer #progress,#footer .prevent-overlay").addClass("hide");
      }
    });
  });
});

function signout() {
  $.ajax({
    url: "php/signout.php",
    method: "GET",
    success: (data, status) => {
      window.location.href = "signin";
    }
  });
}


function passVisibility(elem, id) {
  elem = $(elem);
  var pass = $(id);
  var icon = elem.find("i");
  if (icon.text().endsWith("_off")) {
    elem.attr("data-tooltip", "Hide Password");
    icon.text(icon.text().replace("_off", ""));

    pass.attr("type", "text");
  } else {
    elem.attr("data-tooltip", "Show Password");
    icon.text(icon.text() + "_off");
    pass.attr("type", "password");
  }
}
=======
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
>>>>>>> 8e23e2ed528adde9ef439fc3c4741a993be59076
