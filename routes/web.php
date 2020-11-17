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

// Route::get('/', function () {
//     return view('welcome');
// });

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
});

Route::group(['middleware' => ['auth', 'CheckRole:barbershop']], function () {
    Route::get('/dashboarduser', 'DashboardController@index');
    Route::get('/barbershop/{id}/profile', 'Barbershop\ProfileController@profile');
    Route::get('/barbershop/{id}/edit', 'Barbershop\ProfileController@editprofile');
    Route::post('/barbershop/{id}/update', 'Barbershop\ProfileController@updateprofile');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/dashboards', 'Admin\DashboardController@index');
    Route::resource('/akunpelanggan', 'Admin\PelangganController');
    Route::resource('/akunbarbershop', 'Admin\BarbershopController');
});

// Route::get('/d', function () {
//     return view('page.dashboard');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// });


// Auth::routes();

// // verifikasi email
// Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home');
