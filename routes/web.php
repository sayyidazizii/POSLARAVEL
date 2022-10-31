<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','LoginController@index')->name('login')->middleware('guest');
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');


Route::group(['middleware' => ['auth', 'check.role:admin']], function(){
    
        Route::get('/dashboard', 'DashboardController@index');
    
        Route::get('/supplier', 'SupplierController@index');
        Route::post('/supplier', 'SupplierController@store');
        Route::post('/supplier/{id}/update', 'SupplierController@update');
        Route::get('/supplier/{id}/destroy', 'SupplierController@destroy');
        
        
        
        
        Route::get('/barang', 'BarangController@index');
        Route::get('/barang/create', 'BarangController@create');
        Route::post('/barang', 'BarangController@store');
        Route::get('/barang/{id}/edit', 'BarangController@edit');
        Route::put('/barang/update/{id}', 'BarangController@update');
        Route::get('/barang/{id}/destroy', 'BarangController@destroy');
        //Route::post('/supplier/import', 'BarangController@import');
        
        
        Route::get('/user', 'UserController@index');
        Route::post('/user', 'UserController@store');
        Route::post('/user/{id}/update', 'UserController@update');
        Route::get('/user/{id}/destroy', 'UserController@destroy');

});


Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@update_profile');


    Route::get('/penjualan', 'PenjualanController@index');
});