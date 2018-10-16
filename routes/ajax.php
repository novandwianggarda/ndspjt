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

    // Property
    Route::prefix('/property')->group(function() {
        Route::get('/available', 'PropertiesAjaxController@availableProperties');
        Route::get('/result', 'PropertiesAjaxController@result');
        Route::get('/property_types', 'PropertiesAjaxController@propertyTypes');
    });


    // Taxes
    Route::prefix('/taxes')->group(function() {
        Route::get('/available', 'TaxesAjaxController@availableTaxes');
        Route::get('/result', 'TaxesAjaxController@result');
    });

    // year
    Route::prefix('/year')->group(function() {
        Route::get('/available', 'YearsAjaxController@availableYear');
        Route::get('/result', 'YearsAjaxController@result');
        Route::get('/availabletax', 'YearsAjaxController@availableYearpbb');
        Route::get('/resulttax', 'YearsAjaxController@resultpbb');
    });

    // Global
    Route::get('/diff-two-dates', 'GlobalAjaxController@diffTwoDates');

});
