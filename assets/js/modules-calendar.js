"use strict";

let colour = ["#cc7474", "#c79661", "#ab996d", "#5fa176", "#588c8b", "#536580", "#52546e",];


$("#myEvent").fullCalendar({
    height: 'auto',
    defaultView: 'agendaWeek',
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    eventClick(event, jsEvent, view) {
        window.location.href = 'index.php?ctrl=schedule/scheduleDetail&id='+event.id;
    },
    eventMouseover(event, jsEvent, view) {
        $(this).css('box-shadow', '0 8px 20px 5px rgba(40,40,40,.2)')
    },
    eventMouseout(event, jsEvent, view) {
        $(this).css('box-shadow', '');
    },


    eventSources: [
        {
            url: 'index.php?ctrl=schedule/getListJson',
            dataType: 'json',
            error: function () {
                alert('there was an error while fetching events!');
            },
            success: function (arr) {
                var events = [];
                arr.forEach(function (v) {
                    let c = colour[Math.floor((new Date(v.start_time).getHours()) / 3)];
                    events.push({
                        id: v.id,
                        title: v.name,
                        start: v.start_time,
                        end: v.end_time,
                        backgroundColor: c,
                        borderColor: c,
                        textColor: '#fff',
                    })
                });
                return events;
            }
        }
    ]

});

$("#staff_calendar").fullCalendar({
    height: 'auto',
    defaultView: 'agendaWeek',
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    eventMouseover(event, jsEvent, view) {
        $(this).css('box-shadow', '0 8px 20px 5px rgba(40,40,40,.2)')
    },
    eventMouseout(event, jsEvent, view) {
        $(this).css('box-shadow', '');
    },

    eventSources: [
        {
            url: 'index.php?ctrl=schedule/getStaffScheduleJson',
            dataType: 'json',
            error: function () {
                alert('there was an error while fetching events!');
            },
            success: function (arr) {
                var events = [];
                arr.forEach(function (v) {
                    let c = colour[Math.floor((new Date(v.start_time).getHours()) / 3)];
                    events.push({
                        title: v.name,
                        start: v.start_time,
                        end: v.end_time,
                        backgroundColor: c,
                        borderColor: c,
                        textColor: '#fff',
                    })
                });
                return events;
            }
        },
        {
            url: 'index.php?ctrl=schedule/getTimeStatusJson',
            dataType: 'json',
            error: function () {
                alert('there was an error while fetching events!');
            },
            success: function (arr) {
                var events = [];
                arr.forEach(function (v) {
                    let c = '#666666';
                    events.push({
                        title: 'Unavailable',
                        start: v.start_time,
                        end: v.end_time,
                        backgroundColor: c,
                        borderColor: c,
                        textColor: '#fff',
                    })
                });
                return events;
            }
        }
    ]

});