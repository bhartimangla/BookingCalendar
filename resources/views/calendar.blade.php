<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Booking Calendar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.1/dist/semantic.min.css" rel="stylesheet">
        <link href="https://raw.githubusercontent.com/mdehoog/Semantic-UI-Calendar/master/dist/calendar.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            table {
                height: 600px;
                width: 600px !important;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <h2>Booking Calendar</h2></br>
                <h3>Shop Open Timings 11:00 AM to 8:00 PM</h3>
               <div class="ui calendar" id="date_estimated_arrival"></div>                
            </div>
        </div>
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>

<script type="text/javascript">
$('.ui.calendar').calendar();
$('#date_estimated_arrival').click();

$(document).ready(function () {
    $('.chevron.left').hide();
    var bookedDay = ['26', '30'];
    var bookedTime = ['12:00 PM', '5:00 PM'];
    var bookedHour = [];

    setInterval(function(){ 
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
            var selectedDay = $(".hour span.link").text().match(/\d+/)[0];

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
                $(".minute td.link").click(function() { 
                    window.location.href = window.location.href + 'view';
                });
                $(this).css("cssText", "background-color: green !important;");
            }

        });

    }, 1000);
});
</script>
