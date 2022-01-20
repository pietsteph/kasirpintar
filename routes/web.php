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
    return redirect('/barang');
});

Auth::routes();

Route::get('pembelian', 'BarangController@getPembelian')->name('barang.pembelian.get');
Route::post('pembelian', 'BarangController@postPembelian')->name('barang.pembelian.post');
Route::get('penjualan', 'BarangController@getPenjualan')->name('barang.penjualan.get');
Route::post('penjualan', 'BarangController@postPenjualan')->name('barang.penjualan.post');
Route::resource('barang', BarangController::class);

Route::get('cv', 'CVController@index')->name('cv');
