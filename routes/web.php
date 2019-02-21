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

Route::get('/login', function () {
    return view('auth.login');
});

/**
 * routes with auth middleware
 * which mean only logged user can access
 */
Route::middleware(['web', 'auth'])->group(function () {
    

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/duedates', 'DashboardController@datedue')->name('duedates');
    // Route::get('/logActivity', 'DashboardController@log')->name('logActivity');


    Route::get('add-to-log', 'DashboardController@myTestAddToLog');
    Route::get('logActivity', 'DashboardController@logActivity');



    Route::get('/profile', 'DashboardController@showUserProfile')->name('profile');

    // Property
    Route::prefix('penduduk')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'PendudukController@index')->name('penduduk');
        Route::get('show/{id}', 'PendudukController@show');
        //crud Property
        Route::get('add', 'PendudukController@showAddForm');
        Route::post('add', 'PendudukController@store');
        Route::get('/edit/{id}', 'PendudukController@editprop' )->name('editprop');
        Route::patch('/updateprop/{edit}', 'PendudukController@updateprop');
        Route::delete('/deleteprop/{id}', 'PendudukController@destroyprop' )->name('pend.destroy');
        //import
        Route::get('import', 'PendudukController@import')->name('import');
        Route::post('storeimport', 'PendudukController@storeimport')->name('properti.import');
        Route::post('storeimport/save', 'PendudukController@tes');
        //eksport
        Route::get('eksport', 'PendudukController@eksport');
        Route::get('eksported', 'PendudukController@eksported')->name('exportprop.excel');
    });


    Route::get('/users', 'UserManagerController@index');
    Route::get('add_user', array('uses' => 'UserManagerController@ShowAddUser', 'as' => 'add_user' ));
    Route::post('/storeuser', 'UserManagerController@store');

    Route::get('/edituser/{id}', 'UserManagerController@edit' );
    Route::patch('/updateuser/{edit}', 'UserManagerController@update');
    Route::delete('/deleteuser/{id}', 'UserManagerController@destroy');

});


/** not used */
// Auth::routes();
