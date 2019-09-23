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

Route::get( '/', 'BookInformationController@home');
Route::get( 'dashboard', 'BookInformationController@index');
Route::post( '/store_book', 'BookInformationController@store');
Route::post( '/view_detail', 'BookInformationController@show');
Route::post( 'view_detail_client', 'BookInformationController@show_client');
Route::post( 'SearchBook', 'BookInformationController@SearchBook');
Route::post( '/edit_book', 'BookInformationController@edit');
Route::post( '/delete_book', 'BookInformationController@delete');
Route::post( 'login', 'BookInformationController@login');
Route::post( '/logout', 'BookInformationController@logout');


//Route::get('dashboard','MainController@dashboard');


//Route::post ( '/login', 'MainController@login');
//Route::post ( '/register', 'MainController@register' );
//Route::get ( '/logout', 'MainController@logout' );



