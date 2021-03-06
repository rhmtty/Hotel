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
        Route::get('/cari', 'KamarController@cari');
        Route::post('/save', 'KamarController@postNew');
        Route::get('/edit/{id}', 'KamarController@showEdit');
        Route::post('/edit/{id}', 'KamarController@postEdit');
        Route::delete('/delete', 'KamarController@delete')->name('kamar.delete');
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
        Route::delete('/delete', 'BlokController@deleteData')->name('blok.delete');
    });
    /**
     * 
     * BOOKING CONTROLLER
     */
    Route::group(['prefix' => 'booking'], function(){
        Route::get('/', 'BookingController@index');
        Route::get('/form', 'BookingController@formNew');
        Route::post('/book', 'BookingController@postNew');
        Route::get('/edit/{id}', 'BookingController@editData');
        Route::post('/edit/save/{id}', 'BookingController@editData');
        // if(Route::input('active') == 1){
            Route::get('/check-out/{id}', 'BookingController@CheckOut');
        // }
        Route::post('/check-out/post/{id}', 'BookingController@CheckOut');
        Route::delete('/delete', 'BookingController@deleteBooking');
        Route::get('/cari', 'BookingController@cari');


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
        Route::get('/bookings/view/{tgl}', 'LaporanController@booking');
        Route::get('/aktifitas', 'LaporanController@indexAktivitas');
        Route::get('/aktifitas/view/{key}', 'LaporanController@aktifitas');
        Route::get('/pelanggan', 'LaporanController@pelanggan');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

