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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function() {
    if(!Auth::user()){
        return view('auth.login');
    }else{
        return redirect('/admin');
    }
});

Route::group(['prefix' => 'admin'], function(){
    
    Route::get('/', 'DashboardController@index');
    Route::get('/delete/{id}', 'DashboardController@delete');

    /**
     * KAMAR CONTROLLER
     */
    Route::group(['prefix' => 'kamar'], function(){
        Route::get('/', 'KamarController@index');
        Route::get('/form', 'KamarController@formNew');
        Route::post('/save', 'KamarController@postNew');
        Route::post('/edit/{id}', 'KamarController@showEdit');

    });
    /**
     * BLOK CONTROLLER
     */
    Route::group(['prefix' => 'blok'], function(){
        Route::get('/', 'BlokController@index');
        Route::get('/form', 'BlokController@formNew');
        Route::post('/save', 'BlokController@postNew');
        Route::get('/edit/{id}', 'BlokController@showEdit');
        Route::post('/save/{id}', 'BlokController@postEdit');
        Route::delete('/delete', 'BlokController@deleteData');
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
    /**
     * KARYAWAN CONTROLLER
     */
    Route::group(['prefix' => 'karyawan'], function() {
        Route::get('/', 'KaryawanController@index');
        Route::get('/form', 'KaryawanController@formNew');
        Route::post('/save', 'KaryawanController@postNew');
        Route::get('/profile/{id}', 'KaryawanController@showProfile');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
