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

//Register as an owner
Route::post('/owner', 'OwnerController@store');
//View Owners
Route::get('/owners','OwnerController@index');
//View one owner
Route::get('/owner/{id}','OwnerController@show');

//View User Profile
Route::get('/users', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/save', 'UserController@store');
Route::post('/users/login', 'UserController@login');
