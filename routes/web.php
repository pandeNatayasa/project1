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

Route::get('/','DetailNotaController@dashboard');

Route::resource('/barang','barang');
Route::get('satuan','barang@createSatuan');
Route::post('satuan','barang@storeSatuan');
Route::get('kategori','barang@createKategori');
Route::post('kategori','barang@storeKategori');

Route::resource('/kasir','kasir');
Route::resource('/pembeli','pembeli');
Route::resource('/nota','nota');
Route::resource('/detailnota','DetailNotaController');
//Route::resource('/satuan','SatuanController');

Route::get('tambahBarang/{id}','nota@createBarang');
Route::post('tambahBarang','nota@storeBarang');