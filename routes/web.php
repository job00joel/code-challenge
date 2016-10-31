<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::pattern('code', '[0-9a-zA-Z]+');


Route::get( '/', 'UrlController@index' );
Route::post( '/', 'UrlController@store' );


Route::get( '/{code}', 'UrlController@redirect' );

Route::get( 'info/{code}', 'UrlController@info' );