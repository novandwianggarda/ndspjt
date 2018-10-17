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
    Route::get('/profile', 'DashboardController@showUserProfile')->name('profile');

    // Certificate
    Route::prefix('certificates')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'CertificatesController@index')->name('certificates');
        Route::get('filter', 'CertificatesController@filter');
        Route::get('show/{id}', 'CertificatesController@show');
        Route::get('shows/', 'CertificatesController@certid');
        //create
        Route::get('add', 'CertificatesController@showAddForm');
        Route::post('add', 'CertificatesController@store');
        //edit
        Route::get('/editcert/{id}', 'CertificatesController@editcert' );
        Route::patch('/updatecert/{edit}', 'CertificatesController@updatecert');
        Route::delete('/deletecert/{id}', 'CertificatesController@destroycert')->name('certificates.destroy');
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
        Route::get('list', 'TaxesController@index')->name('taxes');
        Route::get('show/{id}', 'TaxesController@show');
        //crud pbb
        Route::get('add', 'TaxesController@showAddForm');
        Route::post('add', 'TaxesController@store');
        Route::get('/edit/{id}', 'TaxesController@edittax');
        Route::patch('/updatetax/{edit}', 'TaxesController@updatetax');
        Route::delete('/delete/{id}', 'TaxesController@destroy')->name('taxes.destroy');
        //import
        Route::get('import', 'TaxesController@import');
        Route::post('storeimport', 'TaxesController@storeimport')->name('tax.import');
        Route::post('storeimport/save', 'TaxesController@tes');

        //import
        Route::get('importsert', 'TaxesController@importsert');
        Route::post('storeimportsert', 'TaxesController@storeimportsert')->name('tax.importsert');
        Route::post('storeimportsert/save', 'TaxesController@tessert');
        //eksport
        Route::get('eksport', 'TaxesController@eksport');
        Route::get('eksported', 'TaxesController@eksported')->name('exporttax.excel');

        //yearsPBB
        Route::get('tahun', 'TaxesController@tahun')->name('year');
        Route::get('tahunadd', 'TaxesController@tahunadd');
        Route::post('tahunadd', 'TaxesController@storeyearadd');
        Route::get('showyear/{id}', 'TaxesController@showyear');

        Route::patch('/updatyear/{edit}', 'TaxesController@updatetax');
        Route::delete('/deleteyear/{id}', 'TaxesController@destroyyear')->name('taxyears.destroy');
    });

    
    // Lease
    Route::prefix('leases')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'LeasesController@index');
        Route::get('show/{id}', 'LeasesController@show');
        //crud lease
        Route::get('add', 'LeasesController@showAddForm');
        Route::post('add', 'LeasesController@store');
        //import
        Route::get('import', 'LeasesController@import');
        Route::post('storeimport', 'LeasesController@storeimport')->name('leases.import');
        Route::post('storeimport/save', 'LeasesController@leaseimport');
        //eksport
        Route::get('eksport', 'LeasesController@eksport');
        Route::get('eksported', 'LeasesController@eksported')->name('exportlease.excel');
    });

    // Property
    Route::prefix('properties')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/list');
        });
        Route::get('list', 'PropertiesController@index')->name('properties');
        Route::get('show/{id}', 'PropertiesController@show');
        //crud Property
        Route::get('add', 'PropertiesController@showAddForm');
        Route::post('add', 'PropertiesController@store');
        Route::get('/editprop/{id}', 'PropertiesController@editprop' );
        Route::patch('/updateprop/{edit}', 'PropertiesController@updateprop');
        Route::delete('/deleteprop/{id}', 'PropertiesController@destroyprop' )->name('property.destroy');
        //import
        Route::get('import', 'PropertiesController@import')->name('import');
        Route::post('storeimport', 'PropertiesController@storeimport')->name('properti.import');
        Route::post('storeimport/save', 'PropertiesController@tes');
        //eksport
        Route::get('eksport', 'PropertiesController@eksport');
        Route::get('eksported', 'PropertiesController@eksported')->name('exportprop.excel');
    });

    // Lease
    Route::prefix('land')->group(function() {

        Route::get('/', function () {
            return redirect('/' . $this->current->uri . '/maps');
        });
        Route::get('maps', 'LandController@index');
        Route::get('show/{id}', 'LandController@show');
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
    Route::delete('/deleteuser/{id}', 'UserManagerController@destroy');

});


/** not used */
// Auth::routes();
