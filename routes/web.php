<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/admin', function () {
    if (!Auth::user()) {
        return view('auth.login');
    } else {
        return redirect('/');
    }
});

Route::get('/', 'DashboardController@index');

/**
 * 
 * MEMBER CONTROLLER
 **/
Route::group(['prefix' => 'customer'], function () {
    // Route::get('/', 'ApiController@createRetailPaymentAPI');
    Route::get('/register', 'PelangganController@register');
    Route::post('/register/post', 'PelangganController@postRegister');
    Route::get('/login', 'PelangganController@loginForm');
    Route::post('/login/post', 'PelangganController@authenticate');
    Route::get('/booking', 'PelangganController@newBooking');
    Route::get('/create/retail-payment', 'PelangganController@createRetailPayment');
    Route::post('/post/retail-payment', 'PelangganController@postRetailPayment');
    Route::get('/create/va', 'PelangganController@createVirtualAccount');
    Route::post('/post/va', 'PelangganController@postVirtualAccount');
    Route::get('/create/vapermata', 'PelangganController@createVirtualAccountPermata');
    Route::post('/post/vapermata', 'PelangganController@postVirtualAccountPermata');
    Route::get('/create/qris', 'PelangganController@createQrisImage');
    Route::post('/post/qris', 'PelangganController@postQrisImage');
    Route::get('/create/ewallet', 'PelangganController@createEwallet');
    Route::post('/post/ewallet', 'PelangganController@postEwallet');
});

/**
 * PAYMENT CONTROLLER
 * 
 **/
Route::group(['prefix' => 'transaction'], function () {
    Route::get('/inquiry', 'TransactionController@inquiryTransferBank');
    Route::get('/pesanan-saya/', 'TransactionController@customerTransaction');
    Route::get('/pesanan-saya/{invoice}', 'TransactionController@customerTransaction');
    Route::get('/payment/{invoice}', 'TransactionController@payment');
    Route::post('/payment/{invoice}', 'TransactionController@payment');
});

/**
 * 
 * BOOKING CONTROLLER
 */
Route::group(['prefix' => 'booking'], function () {
    Route::get('/', 'BookingController@index');
    Route::get('/form', 'BookingController@formNew');
    Route::post('/book', 'BookingController@postNew');
    Route::get('/edit/{id}', 'BookingController@editData');
    Route::post('/edit/save/{id}', 'BookingController@editData');
    Route::get('/check-out/{invoice}', 'BookingController@CheckOut');
    Route::post('/check-out/post/{invoice}', 'BookingController@CheckOut');
    Route::delete('/delete', 'BookingController@deleteBooking');
    Route::get('/cari', 'BookingController@cari');
});

Route::group(['prefix' => 'admin'], function () {
    /**
     * KAMAR CONTROLLER
     */
    Route::group(['prefix' => 'kamar'], function () {
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
    Route::group(['prefix' => 'blok'], function () {
        Route::get('/', 'BlokController@index');
        Route::get('/form', 'BlokController@formNew');
        Route::post('/save', 'BlokController@postNew');
        Route::get('/edit/{id}', 'BlokController@showEdit');
        Route::post('/save/{id}', 'BlokController@postEdit');
        Route::delete('/delete', 'BlokController@deleteData')->name('blok.delete');
    });
    /**
     * KARYAWAN CONTROLLER
     */
    Route::group(['prefix' => 'karyawan'], function () {
        Route::get('/', 'KaryawanController@index');
        Route::get('/form', 'KaryawanController@formNew');
        Route::get('/profile/{id}', 'KaryawanController@postProfile');
        Route::post('/profile/edit', 'KaryawanController@postProfile');
    });
    /**
     * LAPORAN CONTROLLER
     */
    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/bookings', 'LaporanController@booking');
        Route::get('/bookings/view/{tgl}', 'LaporanController@booking');
        Route::get('/aktifitas', 'LaporanController@indexAktivitas');
        Route::get('/aktifitas/view/{key}', 'LaporanController@aktifitas');
        Route::get('/pelanggan', 'LaporanController@pelanggan');
    });
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
