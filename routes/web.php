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

Route::get('/home', 'HomeController@index')->name('home');
//Data Tindakan
Route::resource('dataTindakan','TindakanController');
// Transaksi
Route::get('transaksi','TransaksiController@index');
Route::get('transaksi/{id}','TransaksiController@indexdet');
Route::post('transaksi/{id}','TransaksiController@pesanan');
Route::get('check-out','TransaksiController@check_out');
Route::delete('check-out/{id}','TransaksiController@delete');
Route::get('konfirmasi-check-out','TransaksiController@konfirmasi');

//Daftar Transaksi
Route::get('history','HistoryController@index');
Route::get('history/{id}','HistoryController@detail');
Route::delete('history/{id}','HistoryController@destroy');

//Print
Route::get('/cetak-tindakan','TindakanController@cetakTindakan')->name('cetak-tindakan');
Route::get('/cetak-index','HistoryController@cetakIndex')->name('cetak-index');
//Route::get('cetak-detail/{id}','HistoryController@cetakDetail');