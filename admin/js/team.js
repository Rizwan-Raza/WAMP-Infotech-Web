M.AutoInit();
// Initialize Firebase
var config = {
    apiKey: "AIzaSyB3JJA-VST4v_FD6-IWmcJITTmmcR-UIzE",
    authDomain: "teamwamp.firebaseapp.com",
    databaseURL: "https://teamwamp.firebaseio.com",
    projectId: "teamwamp",
    storageBucket: "teamwamp.appspot.com",
    messagingSenderId: "578179560525"
};
firebase.initializeApp(config);

var database = firebase.database();
var users = database.ref('users');
var requests = database.ref('requests');
users.once('value').then(snapshots => {
    $(".grey table tbody").empty();
    snapshots.forEach(userAppend);
});

var requestList = new Array();

requests.once('value').then(async snapshots => {
    i = 0;
    await snapshots.forEach(data => {
        let request = data.val();
        request['key'] = data.key;
        requestList.push(request);

        i = !request.read ? i + 1 : i;
    });
    if (i != 0) {
        $("h4 button.right").before(
            `<span class="red white-text border-round pos-abs" style="right:30px;top:10px;z-index:10;height:15px;width:15px;line-height:15px;text-align:center;font-size:10px">${i}</span>`
        );
    }

});
users.on('child_added', userAppend);

function openRequests() {
    let el, i = 0;
    requestList.forEach((e) => {
        el += `<tr ${!e.read ? 'class="fw-700"' :''}>
        <td class="pl-4">${++i}</td>
        <td>${e.email}</td>
        <td>${getDifference(new Date(e.time))}</td>
        <td class="actions"><button class="btn-flat btn-floating transparent waves-effect waves-dark tooltipped" data-tooltip="${e.read ? 'Mark Unread': 'Mark Read'}" onclick="markRead('${e.key}', ${!e.read}, this)"><i class="material-icons black-text">${e.read ? 'mail': 'drafts'}</i></button><button class="btn-flat btn-floating transparent waves-effect waves-dark" onclick="addMember('${e.key}', this)"><i class="material-icons black-text tooltipped" data-tooltip="Add Member">person_add</i></button><button class="btn-flat btn-floating red waves-effect waves-light tooltipped" data-tooltip="Remove Request" onclick="removeRequest('${e.key}', ${e.read}, this)"><i class="material-icons">delete</i></button></td>
        </tr>`;
    });
    if (i > 0) {
        $("#requestModal table tbody").html(el);
        $("#requestModal .tooltipped").tooltip();
    } else {
        $("#requestModal table tbody").html(`<tr><td colspan="4" class="center-align fw-700">No Requests Founds</td></tr>`);
    }
    $("#requestModal").modal("open");
}

function markRead(key, read, elem) {
    var update = {}
    update["/" + key + "/read"] = read;
    requests.update(update);
    requestList.find(x => x.key === key).read = read;
    $(elem).parents("tr").toggleClass("fw-700");
    $(elem).find("i").text(read ? "drafts" : "mail");
    let count = $("h4 span.red.pos-abs");
    $(elem).attr("onclick", "markRead('" + key + "', " + !read + ", this)");
    count.text(+count.text() + (read ? -1 : +1));
}

function removeRequest(key, read, elem) {
    requests.child(key).remove();
    $(elem).parents("tr").fadeOut("slow", () => {
        $(elem).parents("tr").remove();
    });
    let count = $("h4 span.red.pos-abs");
    count.text(+count.text() + (!read ? -1 : 0));
    requestList = requestList.filter(ele => {
        return ele.key != key;
    });
}

function addMember(key, el) {
    markRead(key, true, el);
    var elem = requestList.find(e => {
        e.key == key
    });
    $("#addModal #email").val(elem.email);
    $("#addModal #username").val(elem.email.substring(0, elem.email.lastIndexOf(".")).replace("@", "_"));
    M.updateTextFields();
    $("#requestModal").modal("close");
    $("#addModal").modal("open");
}

function getDifference(date) {
    var delta = Math.round((+new Date - date) / 1000);

    var minute = 60,
        hour = minute * 60,
        day = hour * 24,
        week = day * 7;

    var fuzzy;

    if (delta < 30) {
        fuzzy = 'Just now.';
    } else if (delta < minute) {
        fuzzy = delta + ' seconds ago.';
    } else if (delta < 2 * minute) {
        fuzzy = 'a minute ago.'
    } else if (delta < hour) {
        fuzzy = Math.floor(delta / minute) + ' minutes ago.';
    } else if (Math.floor(delta / hour) == 1) {
        fuzzy = '1 hour ago.'
    } else if (delta < day) {
        fuzzy = Math.floor(delta / hour) + ' hours ago.';
    } else if (delta < day * 2) {
        fuzzy = 'yesterday';
    }
    return fuzzy;
}

function userAppend(data) {
    let user = data.val();
    let elem =
        `<tr>
                <td class="pl-4">
                    ${$('.grey table tbody tr').length + 1}
                </td>
                <td>
                    <img src="${user.imageURL != 'default' ? user.imageURL : '../images/users/pikachu_dummy.png'}" alt="${user.username}" class="materialboxed avatar-icon" />
                </td>
                <td>
                ${user.username}
                </td>
                <td>
                <i class="material-icons ${user.status == "online" ? "green-text": "grey-text" }">lens</i>
                </td>
            </tr>`;
    $(".grey table tbody").append(elem);
}

function addUser(username, email, password) {
    firebase.auth().createUserWithEmailAndPassword(email, password).then(user => {
        database.ref("users/" + user.user.uid).set({
            id: user.user.uid,
            username: username,
            imageURL: "default",
            status: "offline",
            search: username.toLowerCase()
        }, data => {
            loaderShowHide();
            $("#addModal form").get(0).reset();
            $('.modal').modal('close');
        });
    }, error => {
        M.toast({
            html: error.message
        });
    });
}

function userAddAction(e) {
    e.preventDefault();
    let pass1 = $("#addModal #password").val().trim();
    let pass2 = $("#addModal #cpassword").val().trim();
    if (pass1 == pass2) {
        loaderShowHide();
        addUser($("#addModal #username").val().trim(), $("#addModal #email").val().trim(), pass1);
    } else {
        alert("Type same password for confirmation");
    }
}

function loaderShowHide() {
    $("#addModal .progress-holder, #addModal .prevent-overlay").toggleClass("hide");
}