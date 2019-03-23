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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('submit-application', 'ApplicationController@add_register')->name('add.register');

Route::get('verify-application-by-phone-number/{id}', 'ApplicationController@verify_application')
       ->name('verify.registration');

Route::put('verify-application', 'ApplicationController@verify_register')->name('verify.register');

Route::get('successfully-registered/{phone}', 'ApplicationController@successfully_registered')->name('success.register');