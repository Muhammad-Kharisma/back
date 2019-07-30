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
//Routes untuk pertemuan 1
Route::get('/home', function () {
	return view('layout.app');
});
Route::get('/ada', function () {
	return view('layout.app');
});
Route::get('/', function () {
	return view('welcome');
});
Route::post('/', function () {
	return view('berhasil');
});
//

//Routes untuk pertemuan 2
Route::get('/pelanggan', 'pelanggancontroller@index');
Route::get('/cari', 'pelanggancontroller@cari');
Route::get('/daftar', 'pelanggarcontroller@daftar');
Route::resource('/pembeli', 'pembelicontroller');
Route::get('/beli', 'pembelicontroller@beli');


//
//Routes untuk pertemuan 3
//autentification
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//
Route::group(['middleware' => 'auth'], function() {
	Route::resource('/barang', 'barangController');
});
Route::group(['middleware' => 'auth'], function() {
	
});
Route::group(['middleware' => 'auth'], function() {
	Route::resource('/kategori', 'kategoriController');
	Route::resource('/produks', 'produkscontroller');
	Route::resource('/konsumen', 'konsumenController');
	Route::resource('/penjualan', 'penjualanController');
	Route::resource('/detail_penjualan', 'detail_penjualanController');
});


//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
