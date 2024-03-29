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
            Route::get('/system', 'HomeController@showSystem')->name('system.show');
            Route::post('/system', 'HomeController@saveSystem')->name('system.save');
            Route::get('/images/list', 'ImageController@list')->name('images.list');
            Route::post('/images/upload', 'ImageController@upload')->name('images.upload');
            Route::delete('/images/remove', 'ImageController@remove')->name('images.remove');
            Route::resource('images', 'ImageController')->only(['update', 'show']);

            Route::resource('users', 'UserController');
            Route::resource('categories', 'CategoryController')->except('show');
            Route::resource('products', 'ProductController')->except('show');
            Route::resource('contacts', 'ContactController')->only(['index', 'edit', 'update', 'destroy']);
        });
    });
});


Route::namespace('Client')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/contact', 'ContactController@create')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contacts.store');
    Route::get('/{slug}', 'ProductController@show')->name('products.show');
    Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
});

