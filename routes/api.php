<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-detail_penjualan', 'ApiController@getDetailPenjualan');
Route::post('post-detail_penjualan', 'ApiController@postDetailPenjualan');

Route::get('get-penjualan', 'ApiController@getPenjualan');
// Route::get('get-penjualan/{id}', 'ApiController@getPenjualan');
Route::post('post-penjualan', 'ApiController@postPenjualan');

Route::get('get-produks', 'ApiController@getProduks');
Route::get('get-produk/{id}', 'ApiController@getProduk');
Route::post('get-produks', 'ApiController@postProduks');
Route::put('update-produks/{id}', 'ApiController@updateProduks');

Route::get('get-kategori', 'ApiController@getKategori');
Route::post('post-konsumen', 'ApiKonsumenController@postKonsumen');


Route::group(['middleware' => 'auth:api'], function() {
	Route::get('kategori-all', 'ApiController@getKategori');
});
