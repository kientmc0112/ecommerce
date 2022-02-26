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

Route::group(['prefix' => 'admin'], function () {
    Route::namespace('Portal')->group(function () {
        Route::get('/login', 'AuthController@index')->name('portal.login');
        Route::post('/login', 'AuthController@login')->name('portal.auth.login');
        Route::post('/logout', 'AuthController@logout')->name('portal.auth.logout');

        Route::middleware(['auth'])->group(function() {
            Route::get('/', 'HomeController@index')->name('dashboard');
            Route::resource('users', 'UserController');
            Route::resource('categories', 'CategoryController');
        });
    });
});


Route::namespace('Client')->group(function () {
    Route::get('/', function() {
        return view("client.index");
    });
});

