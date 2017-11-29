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
Route::resource('counteries','countriesController');
Route::resource('states','statesController' );
Route::resource('cities','citiesController' );
Route::get('/states/trans/{id}','statesController@add_trans');
Route::post('/states/trans/{id}','statesController@add_trans');
Route::get('/states/{state_id}/trans/{id}/edit','statesController@edit_state_trans');
Route::post('/states/{state_id}/trans/{id}/edit','statesController@edit_state_trans');
Route::get('/states/{state_id}/trans/{id}/delete','statesController@delete_trans_state');
Route::get('/states/{id}/translations','statesController@showStateTranslations')->name('show_state_translations');


Route::get('/counteries/{id}/add_translation','countriesController@addTranslation')->name('add_translation_form');
Route::post('/counteries/{id}/add_translation','countriesController@saveTranslation')->name('save_translation_form');
Route::get('/counteries/{id}/translations','countriesController@showCountryTranslations')->name('show_counteries_translations');


Route::get('/counteries/{id}/edit_translation/{translation_id}','countriesController@editTranslation')->name('edit_country_translation_edit_form');
Route::post('/counteries/{id}/edit_translation/{translation_id}','countriesController@saveEditeTranslation')->name('save_country_translation_edit_form');




Route::get('/counteries/{id}/delete_translation/{translation_id}','countriesController@deleteTranslation')->name('delete_country_translation');







Route::get('/cities/{id}/add_translation','citiesController@addTranslation')->name('add_city_translation_form');
Route::post('/cities/{id}/add_translation','citiesController@saveTranslation')->name('save_city_translation_form');

Route::get('/cities/{id}/edit_translation/{translation_id}','citiesController@editTranslation')->name('edit_city_translation_form');
Route::post('/cities/{id}/edit_translation/{translation_id}','citiesController@saveTranslationEdit')->name('save_city_translation_edit_form');

Route::get('/cities/{id}/delete_translation/{translation_id}','citiesController@deleteTranslation')->name('delete_city_translation');

Route::get('/cities/{id}/translations','citiesController@showCityTranslations')->name('show_cities_translations');
Route::get('/get_full_path/{city_id}','citiesController@getCityFullPath')->name('get_city_full_path');









/******************************************Search**********************************************************/

Route::get('/country_search/','countriesController@searchCounteries')->name('country_search');
Route::get('/city_search/','citiesController@searchCities')->name('city_search');
