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
        Route::get('/edit/{id}', 'KamarController@showEdit');
        Route::post('/edit/{id}', 'KamarController@postEdit');
        Route::delete('/delete', 'KamarController@delete');

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
        Route::post('/book', 'BookingController@postNew');
        Route::get('/edit/{id}', 'BookingController@showEdit');
        Route::get('/check-out', 'BookingController@CheckOut');
        Route::delete('/delete', 'BookingController@deleteBooking');

    });
    /**
     * KARYAWAN CONTROLLER
     */
    Route::group(['prefix' => 'karyawan'], function() {
        Route::get('/', 'KaryawanController@index');
        Route::get('/form', 'KaryawanController@formNew');
        Route::get('/profile/{id}', 'KaryawanController@postProfile');
        Route::post('/profile/edit', 'KaryawanController@postProfile');
    });
    /**
     * LAPORAN CONTROLLER
     */
    Route::group(['prefix' => 'laporan'], function() {
        Route::get('/bookings', 'LaporanController@booking');
        Route::get('/aktifitas', 'LaporanController@aktifitas');
        Route::get('/pelanggan', 'LaporanController@pelanggan');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
