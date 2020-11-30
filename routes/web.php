<?php

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
    Route::get('/booking/{id}/checkout', 'HomeController@checkout');
    Route::post('/booking/{id}/order', 'HomeController@order');
});

Route::group(['middleware' => ['auth', 'CheckRole:pelanggan']], function () {
    Route::get('/pelanggan/{id}/profile', 'Pelanggan\ProfileController@profile');
    Route::get('/pelanggan/{id}/edit', 'Pelanggan\ProfileController@editprofile');
    Route::post('/pelanggan/{id}/update', 'Pelanggan\ProfileController@updateprofile');
});

Route::group(['middleware' => ['auth', 'CheckRole:barbershop']], function () {
    Route::get('/dashboardsbarbershop', 'Barbershop\ProfileController@dashboard');
    // mengelola barber
    Route::get('/barber/{id}', 'Barbershop\BarberController@index');
    Route::get('/barber/{id}/create', 'Barbershop\BarberController@create');
    Route::post('/barber/{id}/store', 'Barbershop\BarberController@store');
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
});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/dashboards', 'Admin\DashboardController@index');
    Route::resource('/akunpelanggan', 'Admin\PelangganController');
    Route::resource('/akunbarbershop', 'Admin\BarbershopController');
});
