<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/all-booked-slots', 'Controller@allBookedSlots');
Route::post('/get-customer', 'Controller@getCustomer');
Route::get('details/{id}', 'Controller@viewCustomerDetails');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/book-slot', 'HomeController@slotBook');
Route::post('/slot-time', 'HomeController@slotTimes');
