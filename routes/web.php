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

/**
 * default route
 * redirect to dashboard
 */
Route::redirect('/', '/dashboard', 301);

/**
 * custom authentification routes
*/
Route::namespace('Auth')->group(function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::post('logout', 'LoginController@logout')->name('logout');

});

/**
 * routes with auth middleware
 * which mean only logged user can access
 */
Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/profile', 'DashboardController@showUserProfile')->name('profile');

    // Certificate
    Route::prefix('certificates')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'CertificatesController@index');
        Route::get('show/{id}', 'CertificatesController@show');
        Route::get('add', 'CertificatesController@showAddForm');
        Route::post('add', 'CertificatesController@store');

    });

    // Tax
    Route::prefix('taxes')->group(function () {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'TaxesController@index');
        Route::get('show/{id}', 'TaxesController@show');
        Route::get('add', 'TaxesController@showAddForm');
        Route::post('add', 'TaxesController@store');

    });

    // Lease
    Route::prefix('leases')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'LeasesController@index');
        Route::get('show/{id}', 'LeasesController@show');
        Route::get('add', 'LeasesController@showAddForm');
        Route::post('add', 'LeasesController@store');

    });

    // Property
    Route::prefix('properties')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'PropertiesController@index');
        Route::get('show/{id}', 'PropertiesController@show');
        Route::get('add', 'PropertiesController@showAddForm');
        // Route::post();

    });

    // User Manager
    Route::get('users', 'UserManagerController@index');
    Route::get('add_user', array('uses' => 'UserManagerController@ShowAddUser', 'as' => 'add_user' ));
    Route::post('add_users', 'UserManagerController@store');

});


/** not used */
// Auth::routes();
