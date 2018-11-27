<?php

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::group(['namespace' => '\App\Controllers', 'exceptionHandler' => \App\Handlers\CustomExceptionHandler::class], function () {

    Route::match(['get', 'post'], '/step1', 'ProductController@step1');
    Route::match(['get', 'post'], '/step2', 'ProductController@step2');
    Route::match(['get', 'post'], '/step3', 'ProductController@step3');

    Route::get('/get-product-type', 'ProductController@getProductType');
    Route::get('/get-product-by-type/{product_type_id?}', 'ProductController@getProductByType');

    Route::get('/quote/{quote_id}', 'QuoteController@index');

});