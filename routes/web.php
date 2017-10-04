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

Route::get('/login',"Auth\LoginController@showLoginForm");
Route::post('login',"Auth\LoginController@login");


Route::group(["middleware" => ["auth"]],function() {

    Route::post("role/create","Api\Auth\RegisterController@createRole");
    Route::post("register","Api\Auth\RegisterController@register");
    Route::post('logout',"Auth\LoginController@logout");
    Route::post("register","Api\Auth\RegisterController@register");
});

Route::group(["middleware" => ["auth"]],function() {


});



Route::get('/', function () {
    return;
});





