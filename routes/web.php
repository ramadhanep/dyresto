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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile/{id}', 'ProfileController@update')->name('profileUpdate');
});
Route::group(["middleware" => ["auth.administrator","auth"]], function(){
    Route::resource("informasiRestoran", "AppController\InformasiRestoranController");
    Route::resource("kategoriMasakan", "AppController\KategoriMasakanController");
    Route::resource("masakan", "AppController\MasakanController");
    Route::resource("meja", "AppController\MejaController");
});
Route::group(["middleware" => ["auth.waiterPelanggan","auth"]], function(){
    Route::resource("keranjang", "AppController\KeranjangController");
    Route::delete("keranjangClean", "AppController\KeranjangController@clean")->name("keranjangClean");
});
Route::group(["middleware" => ["auth.waiterPelangganKasir","auth"]], function(){
    Route::resource("order", "AppController\OrderController");
});
Route::group(["middleware" => ["auth.waiterKasir","auth"]], function(){
    Route::resource("users", "AppController\UserController");
    Route::resource("transaksi", "AppController\TransaksiController");
});
Route::group(["middleware" => ["auth.kasir","auth"]], function(){
    Route::get("riwayatTransaksi", "AppController\TransaksiController@riwayatTransaksi")->name("riwayatTransaksi");
});


Route::group(["prefix" => "print"], function(){
    Route::get('users', 'AppController\UserController@print')->name("printUsers");
    Route::get('kategoriMasakans', 'AppController\KategoriMasakanController@print')->name("printKategoriMasakans");
    Route::get('masakans', 'AppController\MasakanController@print')->name("printMasakans");
    Route::get('transaksis', 'AppController\TransaksiController@print')->name("printTransaksis");
    Route::get('riwayatTransaksis', 'AppController\TransaksiController@printRiwayat')->name("printRiwayatTransaksis");

    Route::get('lpPengguna', 'AppController\LaporanController@lpPengguna')->name("lpPengguna");
    Route::get('lpKategoriMasakan', 'AppController\LaporanController@lpKategoriMasakan')->name("lpKategoriMasakan");
    Route::get('lpMasakan', 'AppController\LaporanController@lpMasakan')->name("lpMasakan");
    Route::get('lpTransaksi', 'AppController\LaporanController@lpTransaksi')->name("lpTransaksi");
    Route::get('lpRiwayatTransaksi', 'AppController\LaporanController@lpRiwayatTransaksi')->name("lpRiwayatTransaksi");
});