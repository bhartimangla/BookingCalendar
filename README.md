# BookingCalendar
Developed on Laravel 5.8, On this booking calender we have a barber shop you are taking online orders and fix the slots . Let the slots are of 1 hour like 10 - 11, 11- 12 and so on . If the shops are open for 10 hours a day and all 10 slots are full the date will change to red , if there is no booking it will be white and if it is partially booked it will be yellow. (Like out of 10 slots , only 5 are booked). Here, Only Admin have access for book the slots.
Database name - bookingCalendar

After clone repository from github-
Instrall composer & PHP >= 7.1.3 version

Run Composer install/update

Create copy of .env.example with name .env

This is your environment file which is required by laravel project

Open .env file and update this file with your MySQL Connection credentials

After that run the following command-

php artisan key:generate

php artisan config:cache

After that run your migration commands

php artisan migrate

php artisan db:seed

Now Run your project with the following command-

php artisan serve --host 0.0.0.0 --port 8000

Now, Admin email - admin@gmail.com, pswd - admin@123
