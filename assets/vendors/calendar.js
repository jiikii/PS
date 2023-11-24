$("#calendar").length && document.addEventListener("DOMContentLoaded", function () {
    var t = moment().startOf("day")
        , e = t.format("YYYY-MM")
        , i = t.clone().subtract(1, "day").format("YYYY-MM-DD")
        , o = t.format("YYYY-MM-DD")
        , t = t.clone().add(1, "day").format("YYYY-MM-DD")
        , r = document.getElementById("calendar");
    new FullCalendar.Calendar(r, {
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
        },
        height: 900,
        contentHeight: 800,
        aspectRatio: 3,
        nowIndicator: !0,
        now: o + "T09:25:00",
        initialView: "dayGridMonth",
        initialDate: o,
        editable: !0,
        dayMaxEvents: !0,
        navLinks: !0,
        events: [{
            title: "All Day Event",
            start: e + "-01",
            description: "Toto lorem ipsum dolor sit incid idunt ut"
        }]
    }).render()
});
    