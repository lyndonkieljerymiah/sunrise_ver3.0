<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post("login", "Api\Auth\LoginController@login");


Route::middleware('auth:api')->group(function () {

    //User
    Route::post("logout", "Api\Auth\LoginController@logout");




    Route::get("villas","Api\VillaController@search")->name("villas");

});



