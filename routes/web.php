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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::resource('baju' , 'BajuController');
    Route::resource('user' , 'UserController');

    Route::get('/stok' , 'StokBajuController@index')->name('stok.index');
    Route::get('/stok/{id}/tambah' , 'StokBajuController@create')->name('stok.create');
    Route::get('/stok/{id}/edit' , 'StokBajuController@edit')->name('stok.edit');
    Route::patch('/stok/update/{id}' , 'StokBajuController@update')->name('stok.update');
    Route::post('/stok/proses' , 'StokBajuController@store')->name('stok.store');
    Route::delete('/stok/delete/{id}' , 'StokBajuController@destroy')->name('stok.destroy');

});
