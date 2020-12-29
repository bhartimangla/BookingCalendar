$('.ui.calendar').calendar();
$('#date_estimated_arrival').click();

$(document).ready(function () {
    $('.chevron.left').hide();
    var bookedTime = '';
    var customerID = '';
    var bookedSlot = '';
    var bookedDaySlot = '';

    $.ajax({
        url: "/all-booked-slots",
        type: "GET",
        async: false,
        success: function (response) {
            var data = JSON.parse(response);
            bookedSlot = data.allBookedSlots[0];
            bookedDaySlot = data.allBookedSlots[1];

            jQuery.each(data.allBookedSlots, function(index, item) {
                $("#dropdown option[value='" + item + "']").hide();
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    var bookedHour = [];
    var currentSelectedDate = '';
    var bookedDay = [];

    setInterval(function() {
        var dayLinks = $(".day td.link");
        var hourLinks = $(".hour td.link");
        var minuteLinks = $(".minute td.link");

        dayLinks.each(function(idx, li) {
            var dayLink = $(li).text();
            jQuery.each(bookedDaySlot, function(index, item) {
                if (item[0] == $(".day span.link").text()) {
                    if ($.inArray(item[1], bookedDay) === -1) {
                        if (!!bookedDay) {
                            Array.prototype.push.apply(bookedDay, item[1]);
                        }
                    }
                } else {
                    bookedDay = [];
                }
            });
            
            if (!!bookedDay) { 
                bookedDay = getUniqueCount(bookedDay);
            }
            if (($.inArray(dayLink, bookedDay) != -1) && ($(li).hasClass('disabled') == false))
            {
                var month = $(".day span.link").text().split(" ")[0];
                var year = $(".day span.link").text().split(" ")[1];
                var slotsCount = getBookingCount(dayLink, month, year);

                if (slotsCount == 10) {
                    $(this).css("cssText", "background-color: red !important;");
                } else if (slotsCount == 5) {
                    $(this).css("cssText", "background-color: yellow !important;");
                } else {
                    $(this).css("cssText", "background-color: green !important;");                    
                }
            }
        });

        hourLinks.each(function(idx, li) {
            var hourLink = $(li).text();
            jQuery.each(bookedSlot, function(index, item) {
                if (item[0] == $(".hour span.link").text()) {
                    bookedTime = item[1];
                }
            });

            var selectedDay = $(".hour span.link").text().match(/\d+/)[0];
            currentSelectedDate = $(".hour span.link").text();
            if (($.inArray(hourLink, bookedTime) != -1) && ($.inArray(selectedDay, bookedDay) != -1))
            {   
                if ($.inArray(hourLink.split(":")[0], bookedHour) == -1) {
                    bookedHour.push(hourLink.split(":")[0]);
                }

                $(this).css("cssText", "background-color: green !important;");
            } 
        });

        minuteLinks.each(function(idx, li) {
            var minuteLink = $(li).text();

            if ($.inArray(minuteLink.split(":")[0], bookedHour) != -1)
            {
                $(this).css("cssText", "background-color: green !important;");
                var terms = minuteLink.split(":")[1].split(" ")[1];
                customerID = getCustomerID(currentSelectedDate, minuteLink.split(":")[0] + ':00 ' + terms);
                window.location.href = window.location.href + 'details/' + customerID;
            }

        });

    }, 1000);
});

function getUniqueCount(bookedDay) {
    var unique = bookedDay.filter(function(itm, i, bookedDay) {
        return i == bookedDay.indexOf(itm);
    });

    return unique;
}

function getBookingCount(day, month, year) {
    var slotsCount = '';

    $.ajax({
        url: "/get-booking-slots",
        type: "POST",
        data: {day: day, month: month, year: year},
        async: false,
        success: function (response) {
            slotsCount = response;
        },
        error: function (error) {
            console.log(error);
        }
    });

    return slotsCount;
}

function getCustomerID(selectDate, selectTime) {
    var name = '';

    $.ajax({
        url: "/get-customer",
        type: "POST",
        data: {date: selectDate, time: selectTime},
        async: false,
        success: function (response) {
            name = response;
        },
        error: function (error) {
            console.log(error);
        }
    });

    return name;
}