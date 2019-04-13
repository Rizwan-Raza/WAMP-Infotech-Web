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

var entries = database.ref("entries");
var users = database.ref("users");
var entriesArr = [];
var usersArr = {};
var fetching = false;
var calendar;
var colors = ["#3788D8", "#ff0000", "#ffa500", "#008000", "#5d4037", "#c2185b", "#e64a19", "#7b1fa2"];

document.addEventListener('DOMContentLoaded', function () {
    users.once("value", async snapshot => {
        var colco = 0;
        snapshot.forEach(element => {
            elem = element.val();
            usersArr[elem.id] = { name: elem.username[0].toUpperCase() + elem.username.substring(1), color: colors[colco++] };
        });
        entries.once("value", async snapshot => {
            await snapshot.forEach(element => {
                elem = element.val();
                // entriesArr.filter(entry => {
                //     return entry.
                // });
                entriesArr.push({
                    title: usersArr[elem.uid].name + " " + elem.type,
                    start: elem.time,
                    backgroundColor: usersArr[elem.uid].color,
                    borderColor: usersArr[elem.uid].color,
                    extraParams: {
                        user: elem.uid,
                        type: elem.type
                    }
                });
            });

            var calendarEl = document.getElementById('calendar');

            let d = new Date();
            let td = new Date(d.setDate(d.getDate() + 1));
            calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid'],
                defaultDate: '2019-04-12',
                validRange: {
                    start: [d.getFullYear(), "01", "01"].join("-"),
                    end: [td.getFullYear(), td.getMonth() + 1, td.getDate()].join("-")
                },
                editable: false,
                lazyFetching: fetching,
                eventLimit: true, // allow "more" link when too many events
                events: entriesArr
            });
            $(".loader").hide();
            $("#listView").show();

            calendar.render();
            $("#gridView").hide();
            let elems = "<h4>Legends </h4>";
            Object.keys(usersArr).forEach(key => {
                let user = usersArr[key];
                elems += `<div style="height: 24px;" class="my-1 left mr-2"><div class="border-round left mr-1" style="width: 24px; height: 24px; background-color: ${user.color}"></div>${user.name}</div>`;
            });
            $("#legends").html(elems);
            let today = new Date().getDate();
            let col = `<tr><th class="pl-2" colspan="2">Users\\Date</th>`;
            for (let ci = 1; ci <= today; ci++) {
                col += `<th ${(new Date(new Date().setDate(ci)).getDay() == 1) ? `class="red white-text center pos-rel" rowspan="${(Object.keys(usersArr).length * 2) + 1}"><div class="left pos-abs w-full" style="top: 15px;left: 0;">${ci}</div><span style="writing-mode: vertical-rl;text-orientation: upright;text-transform: uppercase">Monday</span>` : `class="center">${ci}`}</th>`;
            }
            col += "</tr>";
            let rows = "";
            Object.keys(usersArr).forEach(key => {
                let user = usersArr[key];
                let entryRow = "";
                let exitRow = "";
                let userEntries = entriesArr.filter(entry => {
                    return entry.extraParams.user == key;
                });
                let brief = Math.ceil(userEntries.length / 2) + "/" + today;
                rows += `<tr><th rowspan="2" class="pl-2 tooltipped" data-position="right" data-tooltip="${brief}">${user.name}</th><td class="center">Entry</td>`;
                for (let ci = 1; ci <= today; ci++) {
                    if (new Date(new Date().setDate(ci)).getDay() == 1) {
                        continue;
                    }
                    let tEntry = userEntries.filter(entry => {
                        return new Date(entry.start).getDate() == ci;
                    });
                    if (tEntry.length > 0) {
                        entryRow += `<td class="center present">${new Date(tEntry[0].start).getHours()}:${new Date(tEntry[0].start).getMinutes() < 10 ? "0" : ""}${new Date(tEntry[0].start).getMinutes()}</td>`;
                        if (tEntry.length > 1) {

                            exitRow += `<td class="center present">${new Date(tEntry[1].start).getHours()}:${new Date(tEntry[1].start).getMinutes() < 10 ? "0" : ""}${new Date(tEntry[1].start).getMinutes()}</td>`;
                        } else {
                            exitRow += `<td class="center attending">-</td>`;
                        }
                    } else {
                        entryRow += `<td class="center absent" rowspan="2">AB</td>`;
                    }

                }
                rows += entryRow;
                rows += `</tr>`;
                rows += `<tr><td class="center">Exit</td>${exitRow}</tr>`;
            });
            $("#listView table tbody").html(col);
            $("#listView table tbody").append(rows);
            M.Tooltip.init(document.querySelectorAll('.tooltipped'), {});
        });
    });
});
function switchView(elem) {
    let icon = $(elem).find("i");
    icon.text() == "date_range" ? icon.text("view_column") : icon.text("date_range");
    $("#gridView").toggle();
    $("#listView").toggle();
}