<?php

use App\Http\Controllers\API\CustomerController;
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
//==================Mobile Customer=========
Route::middleware('auth:sanctum')->group(function(){
    Route::get('customer', [CustomerController::class, 'fetch']);
    Route::post('customer', [CustomerController::class, 'updateProfile']);
    Route::post('customer/photo', [CustomerController::class, 'updatePhoto']);
    Route::post('logout', [CustomerController::class, 'logout']);
});

Route::post('login', [CustomerController::class, 'login']);
Route::post('register', [CustomerController::class, 'register']);


// Ambil Semua Data area
Route::get('area', 'API\AreaController@index');
// Membuat area Baru
Route::post('area', 'API\AreaController@store');
// Mengambil Satu area
Route::get('area/{id_area}', 'API\AreaController@show');
// Mengubah area
Route::put('area/{id_area}', 'API\AreaController@update');
// Menghapus area
Route::delete('area/{id_area}', 'API\AreaController@destroy');

//-----------------------------------------

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

//-----------------------------------------

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

//-------------------------------------------------

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

//--------------------------------------------

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

//----------------------------------------------------

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

//---------------------------------------

// Ambil Semua DataKeluarga
Route::get('datakeluarga', 'API\DataKeluargaController@index');
// Membuat DataKeluarga Baru
Route::post('datakeluarga', 'API\DataKeluargaController@store');
// Mengambil Satu DataKeluarga
Route::get('datakeluarga/{id_data_keluarga}', 'API\DataKeluargaController@show');
// Mengubah DataKeluarga
Route::put('datakeluarga/{id_data_keluarga}', 'API\DataKeluargaController@update');

//---------------------------------------

// Ambil Semua DataPribadi
Route::get('datapribadi', 'API\DataPribadiController@index');
// Membuat DataPribadi Baru
Route::post('datapribadi', 'API\DataPribadiController@store');
// Mengambil Satu DataPribadi
Route::get('datapribadi/{id_data_pribadi', 'API\DataPribadiController@show');
// Mengubah DataPribadi
Route::put('datapribadi/{id_data_pribadi', 'API\DataPribadiController@update');
// Menghapus DataPribadi
Route::delete('datapribadi/{id_data_pribadi}', 'API\DataPribadiController@destroy');

//---------------------------------------

// Ambil Semua PendidikanFormal
Route::get('pendidikanformal', 'API\PendidikanFormalController@index');
// Membuat PendidikanFormal Baru
Route::post('pendidikanformal', 'API\PendidikanFormalController@store');
// Mengambil Satu PendidikanFormal
Route::get('pendidikanformal/{id_pendFormal', 'API\PendidikanFormalController@show');
// Mengubah PendidikanFormal
Route::put('pendidikanformal/{id_pendFormal', 'API\PendidikanFormalController@update');
// Menghapus PendidikanFormal
Route::delete('pendidikanformal/{id_pendFormal}', 'API\PendidikanFormalController@destroy');

//---------------------------------------

// Ambil Semua PendidikanNonFormal
Route::get('pendidikannonformal', 'API\PendidikanNonFormalController@index');
// Membuat PendidikanNonFormal Baru
Route::post('pendidikannonformal', 'API\PendidikanNonFormalController@store');
// Mengambil Satu PendidikanNonFormal
Route::get('pendidikannonformal/{id_pendNonFormal', 'API\PendidikanNonFormalController@show');
// Mengubah PendidikanNonFormal
Route::put('pendidikannonformal/{id_pendNonFormal', 'API\PendidikanNonFormalController@update');
// Menghapus PendidikanNonFormal
Route::delete('pendidikannonformal/{id_pendNonFormal}', 'API\PendidikanNonFormalController@destroy');

//---------------------------------------

// Ambil Semua Keterampilan
Route::get('keterampilan', 'API\KeterampilanController@index');
// Membuat Keterampilan Baru
Route::post('keterampilan', 'API\KeterampilanController@store');
// Mengambil Satu Keterampilan
Route::get('keterampilan/{id_keterampilan', 'API\KeterampilanController@show');
// Mengubah Keterampilan
Route::put('keterampilan/{id_keterampilan', 'API\KeterampilanController@update');
// Menghapus Keterampilan
Route::delete('keterampilan/{id_keterampilan}', 'API\KeterampilanController@destroy');

//---------------------------------------

// Ambil Semua PengalamanKerja
Route::get('pengalamankerja', 'API\PengalamanKerjaController@index');
// Membuat PengalamanKerja Baru
Route::post('pengalamankerja', 'API\PengalamanKerjaController@store');
// Mengambil Satu PengalamanKerja
Route::get('pengalamankerja/{id_pengalaman', 'API\PengalamanKerjaController@show');
// Mengubah PengalamanKerja
Route::put('pengalamankerja/{id_pengalaman', 'API\PengalamanKerjaController@update');
// Menghapus PengalamanKerja
Route::delete('pengalamankerja/{id_pengalaman}', 'API\PengalamanKerjaController@destroy');

//---------------------------------------

// Ambil Semua TenagaKerja
Route::get('tenagakerja', 'API\TenagaKerjaController@index');
// Membuat TenagaKerja Baru
Route::post('tenagakerja', 'API\TenagaKerjaController@store');
// Mengambil Satu TenagaKerja
Route::get('tenagakerja/{id_tenagaKerja', 'API\TenagaKerjaController@show');
// Mengubah TenagaKerja
Route::put('tenagakerja/{id_tenagaKerja', 'API\TenagaKerjaController@update');
// Menghapus TenagaKerja
Route::delete('tenagakerja/{id_tenagaKerja}', 'API\TenagaKerjaController@destroy');
