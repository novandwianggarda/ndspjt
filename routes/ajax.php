<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| AJax Routes
|--------------------------------------------------------------------------
| only use for ajax request
|
| why dont use api route?
| because it doesnt use api middleware,
| instead with ajax we use web milddeware
|
*/

/**
 * routes with auth middleware
 * which mean only logged user can access
 */
Route::middleware('auth')->group(function() {

    // Certificate
    Route::prefix('/certificate')->group(function() {
        Route::get('/available', 'CertificatesAjaxController@availableCertificates');
        Route::get('/result', 'CertificatesAjaxController@result');
        Route::get('/certificate_types', 'CertificatesAjaxController@certificateTypes');
    });

    // Lease
    Route::prefix('/lease')->group(function() {
        Route::get('/lease_types', 'LeasesAjaxController@leaseTypes');
    });

    // Global
    Route::get('/diff-two-dates', 'GlobalAjaxController@diffTwoDates');

});
