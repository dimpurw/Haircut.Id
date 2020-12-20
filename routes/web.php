<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', 'PageController@home');
Route::get('/barbershop', 'PageController@barbershop');
Route::get('/registerbarbershop', 'PageController@registerbarbershop');
Route::get('/registerpelanggan', 'PageController@registerpelanggan')->name('register');
Route::post('/postregisterbarbershop', 'PageController@postregisterbarbershop');
Route::post('/postregisterpelanggan', 'PageController@postregisterpelanggan');

Route::get('login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::get('/email', 'ForgotPasswordController@email');
Route::post('postforgot', 'ForgotPasswordController@postforgot')->name('postforgot');
Route::get('/password/reset', 'ForgotPasswordController@verifytoken');
Route::post('/activationtoken', 'ForgotPasswordController@postverifytoken')->name('activationtoken');
Route::get('/resetpassword/{id}', 'ForgotPasswordController@reset')->name('resetpassword');
Route::post('/resetnewpassword/{id}', 'ForgotPasswordController@updatepass');

Route::group(['middleware' => ['auth', 'CheckRole:pelanggan,barbershop,admin']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/detail/{id}', 'HomeController@detail');
    Route::get('/booking/{id}/show', 'HomeController@bookingshow');
    Route::get('/showbarbershop', 'HomeController@barbershopshow');
});

Route::group(['middleware' => ['auth', 'CheckRole:pelanggan']], function () {
    // mengelola profile
    Route::get('/pelanggan/{id}/profile', 'Pelanggan\ProfileController@profile');
    Route::get('/pelanggan/{id}/edit', 'Pelanggan\ProfileController@editprofile');
    Route::post('/pelanggan/{id}/update', 'Pelanggan\ProfileController@updateprofile');
    // booking dan pembayaran
    Route::get('/booking/{id}/checkout', 'HomeController@checkout');
    Route::get('GetSubCatAgainstMainCatEdit/{id}', 'HomeController@GetSubCatAgainstMainCatEdit');
    Route::post('/booking/{id}/order', 'HomeController@order');
    Route::post('/webhook/xendit-invoice', 'HomeController@saveDataApi');
    Route::get('/chat/{id}', 'pelanggan\ChatController@index');
    Route::post('/chat/{id}/store', 'pelanggan\ChatController@store');
    Route::get('/transaksi/{id}', 'pelanggan\TransaksiController@index');
});

Route::group(['middleware' => ['auth', 'CheckRole:barbershop']], function () {
    Route::get('/dashboardsbarbershop', 'Barbershop\ProfileController@dashboard');
    // mengelola barber
    Route::get('/barber/{id}', 'Barbershop\BarberController@index')->name('barber');
    Route::get('/barber/{id}/create', 'Barbershop\BarberController@create');
    Route::post('/barber/{id}/store', 'Barbershop\BarberController@store');
    Route::get('/barber/{id}/edit', 'Barbershop\BarberController@edit');
    Route::post('/barber/{id}/update', 'Barbershop\BarberController@update');
    // mengelola booking
    Route::get('/booking/{id}', 'Barbershop\JadwalController@index');
    Route::get('/booking/{id}/create', 'Barbershop\JadwalController@create');
    Route::post('/booking/{id}/store', 'Barbershop\JadwalController@store');
    //mengelola layanan
    Route::get('/layanan/{id}', 'Barbershop\LayananController@index');
    Route::get('/layanan/{id}/create', 'Barbershop\LayananController@create');
    Route::post('/layanan/{id}/store', 'Barbershop\LayananController@store');
    // mengelola profile
    Route::get('/barbershop/{id}/profile', 'Barbershop\ProfileController@profile');
    Route::get('/barbershop/{id}/edit', 'Barbershop\ProfileController@editprofile');
    Route::post('/barbershop/{id}/update', 'Barbershop\ProfileController@updateprofile');
    // chat
    Route::get('/barbershopchat', 'Barbershop\ChatController@index');
    Route::get('/barbershopchat/{id}', 'Barbershop\ChatController@chat');
    Route::post('/barbershopchat/{id}/store', 'Barbershop\ChatController@store');
    // transaksi
    Route::get('/riwayatbooking/{id}', 'Barbershop\TransaksiController@booking');
    Route::get('/transaksi/{id}', 'Barbershop\TransaksiController@index');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/dashboards', 'Admin\DashboardController@index');
    Route::resource('/akunpelanggan', 'Admin\PelangganController');
    Route::resource('/akunbarbershop', 'Admin\BarbershopController');
    Route::get('/riwayatbooking', 'Admin\DashboardController@booking');
    Route::get('/transaksi', 'Admin\DashboardController@transaksi');
});
