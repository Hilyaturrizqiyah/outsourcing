<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Ambil Semua Data Customer
Route::get('area', 'API\AreaController@index');
// Membuat Customer Baru
Route::post('area', 'API\AreaController@store');
// Mengambil Satu area
Route::get('area/{id_area}', 'API\AreaController@show');
// Mengubah area
Route::put('area/{id_area}', 'API\AreaController@update');
// Menghapus area
Route::delete('area/{id_area}', 'API\AreaController@destroy');

---

// Ambil Semua Data Customer
Route::get('customer', 'API\CustomerController@index');
// Membuat Customer Baru
Route::post('customer', 'API\CustomerController@store');
// Mengambil Satu Customer
Route::get('customer/{id_customer}', 'API\CustomerController@show');
// Mengubah Customer
Route::put('customer/{id_customer}', 'API\CustomerController@update');
// Menghapus Customer
Route::delete('customer/{id_customer}', 'API\CustomerController@destroy');

---

// Ambil Semua Data Admin
Route::get('admin', 'API\AdminController@index');
// Membuat Admin Baru
Route::post('admin', 'API\AdminController@store');
// Mengambil Satu Admin
Route::get('admin/{id_admin}', 'API\AdminController@show');
// Mengubah Admin
Route::put('admin/{id_admin}', 'API\AdminController@update');
// Menghapus Admin
Route::delete('admin/{id_admin}', 'API\AdminController@destroy');

---

// Ambil Semua Jasa
Route::get('jenis', 'API\JenisJasaController@index');
// Membuat Jasa Baru
Route::post('jenis', 'API\JenisJasaController@store');
// Mengambil Satu Jasa
Route::get('jenis/{id_jenisjasa}', 'API\JenisJasaController@show');
// Mengubah Jasa
Route::put('jenis/{id_jenisjasa}', 'API\JenisJasaController@update');
// Menghapus Jasa
Route::delete('jenis/{id_jenisjasa}', 'API\JenisJasaController@destroy');

---

// Ambil Semua Outsourcing
Route::get('outsourcing', 'API\OutsourcingController@index');
// Membuat Outsourcing Baru
Route::post('outsourcing', 'API\OutsourcingController@store');
// Mengambil Satu Outsourcing
Route::get('outsourcing/{id_outsourcing}', 'API\OutsourcingController@show');
// Mengubah Outsourcing
Route::put('outsourcing/{id_outsourcing}', 'API\OutsourcingController@update');
// Menghapus Outsourcing
Route::delete('outsourcing/{id_outsourcing}', 'API\OutsourcingController@destroy');

---

// Ambil Semua Outsourcing
Route::get('outsourcing', 'API\OutsourcingController@index');
// Membuat Outsourcing Baru
Route::post('outsourcing', 'API\OutsourcingController@store');
// Mengambil Satu Outsourcing
Route::get('outsourcing/{id_outsourcing}', 'API\OutsourcingController@show');
// Mengubah Outsourcing
Route::put('outsourcing/{id_outsourcing}', 'API\OutsourcingController@update');
// Menghapus Outsourcing
Route::delete('outsourcing/{id_outsourcing}', 'API\OutsourcingController@destroy');

---

// Ambil Semua DataKeluarga
Route::get('datakeluarga', 'API\DataKeluargaController@index');
// Membuat DataKeluarga Baru
Route::post('datakeluarga', 'API\DataKeluargaController@store');
// Mengambil Satu DataKeluarga
Route::get('datakeluarga/{id_data_keluarga}', 'API\DataKeluargaController@show');
// Mengubah DataKeluarga
Route::put('datakeluarga/{id_data_keluarga}', 'API\DataKeluargaController@update');