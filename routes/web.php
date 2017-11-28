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
    return view('layout.dashboard');
});

Route::resource('counteries','countriesController');
Route::resource('states','statesController' );
Route::resource('cities','citiesController' );
Route::get('/states/trans/{id}','statesController@add_trans');
Route::post('/states/trans/{id}','statesController@add_trans');
Route::get('/states/{state_id}/trans/{id}/edit','statesController@edit_state_trans');
Route::post('/states/{state_id}/trans/{id}/edit','statesController@edit_state_trans');
Route::get('/states/{state_id}/trans/{id}/delete','statesController@delete_trans_state');



