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


//mobile application registration

Route::post("login", "Api\Auth\LoginController@login");
Route::get("user", "Api\Auth\UserController@index");
Route::get("user/{id}/edit", "Api\Auth\UserController@edit");
Route::post("user", "Api\Auth\UserController@register");
Route::patch("user/{id}", "Api\Auth\UserController@update");


//role
Route::post("role/create","Api\Auth\RoleController@create");


Route::middleware('auth:api')->group(function () {

    //User
    Route::post("logout", "Api\Auth\LoginController@logout");




    Route::get("villas","Api\VillaController@search")->name("villas");

});



