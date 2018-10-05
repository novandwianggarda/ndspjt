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

// Auth::routes();
// Route::post('exit', 'Auth\LoginController@logout')->name('logout');

//     Route::prefix('superadmin')->group(function() {
//         Route::get('/profil', 'SuperController@index')->name('Super');
//     });
//     Route::prefix('admin')->group(function() {
//         Route::get('/profil', 'AdminController@index')->name('Admin');
//     });



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
        Route::get('filter', 'CertificatesController@filter');
        Route::get('show/{id}', 'CertificatesController@show');
        Route::get('shows/', 'CertificatesController@certid');
        //create
        Route::get('add', 'CertificatesController@showAddForm');
        Route::post('add', 'CertificatesController@store');
        //edit
        Route::get('/editcert/{id}', 'CertificatesController@editcert' );
        Route::patch('/updatecert/{edit}', 'CertificatesController@updatecert');
        Route::delete('/deletecert/{id}', 'CertificatesController@destroycert' );
        //import
        Route::get('import', 'CertificatesController@import');
        Route::post('storeimport', 'CertificatesController@storeimport')->name('certificate.import');
        Route::post('storeimport/save', 'CertificatesController@tes');
        Route::get('eksport', 'CertificatesController@eksport');
        Route::get('eksported', 'CertificatesController@eksported')->name('export.excel');

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

        Route::get('/edit/{id}', 'TaxesController@edittax' );
        Route::patch('/updatetax/{edit}', 'TaxesController@updatetax');
        Route::delete('/delete/{id}', 'TaxesController@destroy' );

        Route::get('import', 'TaxesController@import');
        Route::post('storeimport', 'TaxesController@storeimport')->name('tax.import');
        Route::post('storeimport/save', 'TaxesController@tes');

        Route::get('tahun', 'TaxesController@tahun');
        Route::get('eksport', 'TaxesController@eksport');
        Route::get('eksported', 'TaxesController@eksported')->name('exporttax.excel');
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

        Route::get('import', 'LeasesController@import');
        Route::post('storeimport', 'LeasesController@storeimport')->name('leases.import');
        Route::post('storeimport/save', 'LeasesController@leaseimport');
    });

    // Property
    Route::prefix('properties')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'PropertiesController@index');
        Route::get('show/{id}', 'PropertiesController@show');
        Route::get('add', 'PropertiesController@showAddForm');
        Route::post('add', 'PropertiesController@store');
        Route::get('import', 'PropertiesController@import')->name('import');

        Route::post('storeimport', 'PropertiesController@storeimport')->name('properti.import');
        Route::post('storeimport/save', 'PropertiesController@tes');
    });

    // Route::prefix('user')->group(function() {

    //     Route::get('/', function () {
    //         return redirect('/' . $this->current->uri . '/user');
    //     });
    //     Route::get('list', 'PropertiesController@index');
    //     Route::get('show/{id}', 'PropertiesController@show');
    //     Route::get('add', 'PropertiesController@showAddForm');
    //     Route::post('add', 'PropertiesController@store');
    // });



    // User Manager
    // Route::get('users', 'UserManagerController@index');
    // Route::get('add_user', array('uses' => 'UserManagerController@ShowAddUser', 'as' => 'add_user' ));
    // Route::post('add_users', 'UserManagerController@store');

    Route::get('/users', 'UserManagerController@index');
    Route::get('add_user', array('uses' => 'UserManagerController@ShowAddUser', 'as' => 'add_user' ));
    Route::post('/storeuser', 'UserManagerController@store');

    Route::get('/edituser/{id}', 'UserManagerController@edit' );
    Route::patch('/updateuser/{edit}', 'UserManagerController@update');
    Route::delete('/deleteuser/{id}', 'UserManagerController@destroy' );

});


/** not used */
// Auth::routes();
