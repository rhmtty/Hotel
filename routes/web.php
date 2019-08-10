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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function() {
        return view('template');
    });

    /**
     * KAMAR CONTROLLER
     */
    Route::group(['prefix' => 'kamar'], function(){
        Route::get('/', 'KamarController@index');
        Route::get('/form', 'KamarController@formNew');
        Route::get('/save', 'KamarController@postNew');

    });
    /**
     * LANTAI CONTROLLER
     */
    Route::group(['prefix' => 'lantai'], function(){
        Route::get('/', 'LantaiController@index');
        Route::get('/form', 'LantaiController@formNew');
        Route::post('/save', 'LantaiController@postNew');

    });
    /**
     * TIPE KAMAR CONTROLLER
     */
    Route::group(['prefix' => 'tipe-kamar'], function(){
        Route::get('/', 'TipeKamarController@index');
        Route::get('/form', 'TipeKamarController@formNew');
        Route::post('/save', 'TipeKamarController@postNew');
    });
    /**
     * BLOK CONTROLLER
     */
    Route::group(['prefix' => 'blok'], function(){
        Route::get('/', 'BlokController@index');
        Route::get('/form', 'BlokController@formNew');
        Route::post('/save', 'BlokController@postNew');
    });
    /**
     * 
     * BOOKING CONTROLLER
     */
    Route::group(['prefix' => 'booking'], function(){
        Route::get('/', 'BookingController@index');
        Route::get('/form', 'BookingController@formNew');
        Route::post('/save', 'BookingController@postNew');

    });
});
