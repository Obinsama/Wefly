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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();
//Route::group(['middleware' => ['auth']], function() {
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
//Route::get('/vols', 'HomeController@vols')->name('vol.index');
//Route::get('/vols', 'VolsController@index')->name('vol.index');
//Route::get('/resa', 'ReservationsController@index')->name('resa.index');
//Route::post('/resa', 'ReservationsController@store')->name('resa.store');
Route::resource('reservations','ReservationsController');
Route::resource('vols','VolsController');
//});