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

// --------------Admin-------------------//
Route::get('/admin/DashboardAdmin', function () {
    return view('admin.halaman.DashboardAdmin');
});

Route::get('/admin/MengelolaAdmin','MengelolaAdminController@index');
Route::get('/admin/TambahAdmin','MengelolaAdminController@tambah');
Route::post('/admin/AksiTambahAdmin','MengelolaAdminController@store');
Route::get('/admin/UbahAdmin{id_admin}','MengelolaAdminController@edit');
Route::post('/admin/AksiUbahAdmin{id_admin}','MengelolaAdminController@update');
Route::get('/admin/HapusAdmin{id_admin}','MengelolaAdminController@delete');

Route::get('/admin/MengelolaJenisJasa','MengelolaJenisJasaController@index');
Route::get('/admin/TambahJenisJasa','MengelolaJenisJasaController@tambah');
Route::post('/admin/AksiTambahJenisJasa','MengelolaJenisJasaController@store');
Route::get('/admin/UbahJenisJasa{id_jenisJasa}','MengelolaJenisJasaController@edit');
Route::post('/admin/AksiUbahJenisJasa{id_jenisJasa}','MengelolaJenisJasaController@update');
Route::get('/admin/HapusJenisJasa{id_jenisJasa}','MengelolaJenisJasaController@delete');

Route::get('/admin/MengelolaArea','MengelolaAreaController@index');
Route::get('/admin/TambahArea','MengelolaAreaController@tambah');
Route::post('/admin/AksiTambahArea','MengelolaAreaController@store');
Route::get('/admin/UbahArea{id_area}','MengelolaAreaController@edit');
Route::post('/admin/AksiUbahArea{id_area}','MengelolaAreaController@update');
Route::get('/admin/HapusArea{id_area}','MengelolaAreaController@delete');

Route::get('/admin/MengelolaCustomer','MengelolaCustomerController@index');
Route::get('/admin/HapusCustomer{id_customer}','MengelolaCustomerController@delete');


//----------------------Admin---------------------//

//----------------------TenagaKerja-----------------//

Route::get('/tenagakerja','TenagakerjaController@index');
Route::get('/tenagakerja/LoginTenagakerja','TenagakerjaController@login');
Route::post('/tenagakerja/AksiLoginTenagakerja','TenagakerjaController@postLogin');
Route::get('/tenagakerja/RegisterTenagakerja','TenagakerjaController@tambah');
Route::get('/logoutTenagaKerja','TenagakerjaController@logout');

Route::post('/tenagakerja/AksiTambahTenagakerja','TenagaKerjaController@store');
Route::post('/tenagakerja/AksiUbahTenagakerja{id_tenagaKerja}','TenagaKerjaController@update');

Route::post('/tenagakerja/AksiTambahDataKeluarga','DataKeluargaController@store');
Route::post('/tenagakerja/AksiUbahDataKeluarga{id_dataKeluarga}','DataKeluargaController@update');

//----------------------TenagaKerja-----------------//


Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/pengguna_jasa/index', function () {
    return view('/pengguna_jasa/index');
});

Route::get('/','UtamaController@tampil');
Route::get('/index/area/cari','UtamaController@cari');