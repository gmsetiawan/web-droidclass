<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['web', 'activity']], function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');
});

// Disable Register => Remove below code parameter if enable Register
Auth::routes([
    'register' => false,
    'reset' => false,
    ]);

// Disable Login => Remove below code if enable Login
Route::match(['get', 'post'], 'login', function(){
    return redirect('/');
});

Route::group(['middleware' => ['web', 'auth', 'activity']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});


