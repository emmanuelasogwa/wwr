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

Route::get('/home', 'HomeController@index');

Route::get('post', function () {
    return view('schemes.create');
});
//update a referral scheme
Route::post('/{id}/edit' , 'SchemesController@update')->name('update_scheme');
Route::resource('schemes','SchemesController');
//find referrer
Route::get('/{id}/refer' , 'SchemesController@show')->name('refer');
