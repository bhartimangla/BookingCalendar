$('.ui.calendar').calendar();
$('#date_estimated_arrival').click();

$(document).ready(function () {
    $('.chevron.left').hide();
    var bookedDay = '';
    var bookedTime = '';
    var customerID = '';
    var bookedSlot = '';

    $.ajax({
        url: "/all-booked-slots",
        type: "GET",
        async: false,
        success: function (response) {
            var data = JSON.parse(response);
            bookedSlot = data.allBookedSlots[0];
            bookedDay = data.allBookedSlots[1];

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

    setInterval(function() { 
        var dayLinks = $(".day td.link");
        var hourLinks = $(".hour td.link");
        var minuteLinks = $(".minute td.link");

        dayLinks.each(function(idx, li) {
            var dayLink = $(li).text();

            if (($.inArray(dayLink, bookedDay) != -1) && ($(li).hasClass('disabled') == false))
            {
                $(this).css("cssText", "background-color: green !important;");
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