<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Booking Calendar</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.1/dist/semantic.min.css" rel="stylesheet">
        <link href="https://raw.githubusercontent.com/mdehoog/Semantic-UI-Calendar/master/dist/calendar.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
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
<script src="js/custom.js"></script>