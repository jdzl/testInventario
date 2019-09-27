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

Route::get('/', function () {
    return view('inventario/create');
});

Route::get('inventario', 'InventarioController@index')->name('inventario');
Route::get('inventario/{codigo}/existe', 'InventarioController@isNew')->name('inventario/{id}/existe');
Route::get('inventario/historial', 'InventarioController@history')->name('inventario/historial');

Route::get('inventario/vender', 'InventarioController@sell')->name('inventario/sell');
Route::post('inventario/vender', 'InventarioController@sell')->name('inventario/vender');

Route::get('inventario/nuevo', 'InventarioController@create')->name('inventario/nuevo');
Route::post('/inventario/nuevo', 'InventarioController@create')->name('inventario/create');


Route::view('inventario/search', 'inventario/search')->name('inventario/search');
Route::post('inventario/search', 'InventarioController@search')->name('inventario/search');

Route::post('inventario/edit', 'InventarioController@edit')->name('inventario/edit');
Route::get('inventario/{codigo}', 'InventarioController@edit')->name('inventario/{codigo}');

