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

/** Default Route */
Route::get('/', function () {
    return redirect('dashboard');
});

/** Auth */
Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

/** Already Logged In */
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

/** Not Used */
// Auth::routes();
