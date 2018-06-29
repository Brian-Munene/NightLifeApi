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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route to view all locations
Route::get('/chillspots', 'ChillspotController@index');
//Route to add a locations
Route::post('/chillspot','ChillspotController@store');
//Route to view a location
Route::get('/chillspot/{id}','ChillspotController@show');
//Route to remove a location
Route::delete('/chillspotdelete/{id}','ChillspotController@destroy');

//Route to write a review
Route::post('/review','ReviewController@store');
//Route to view reviews
Route::get('/reviews','ReviewController@index');
//Route to view a specific review
Route::get('/review/{id}','ReviewController@show');
//Route to view a review
Route::delete('/reviewdelete/{id}','ReviewController@destroy');

//View User Profile
Route::get('/user', 'UserController@show');