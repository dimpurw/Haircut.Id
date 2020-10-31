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

Route::group(['middleware' => ['auth', 'CheckRole:pelanggan,barbershop,admin']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/dashboards', 'DashboardController@dashboard');
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
