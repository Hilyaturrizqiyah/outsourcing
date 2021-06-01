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

// --------------LandingPage-------------------//
Route::get('/','UtamaController@tampil');
Route::get('/Register','UtamaController@tambah');

// --------------LandingPage-------------------//

// --------------Admin-------------------//
Route::get('/admin/DashboardAdmin', function () {
    return view('admin.halaman.DashboardAdmin');
});

Route::get('/admin/MengelolaAdmin', 'MengelolaAdminController@index');
Route::get('/admin/TambahAdmin', 'MengelolaAdminController@tambah');
Route::post('/admin/AksiTambahAdmin', 'MengelolaAdminController@store');
Route::get('/admin/UbahAdmin{id_admin}', 'MengelolaAdminController@edit');
Route::post('/admin/AksiUbahAdmin{id_admin}', 'MengelolaAdminController@update');
Route::get('/admin/HapusAdmin{id_admin}', 'MengelolaAdminController@delete');

Route::get('/admin/MengelolaJenisJasa','MengelolaJenisJasaController@index');
Route::get('/admin/TambahJenisJasa','MengelolaJenisJasaController@tambah');
Route::post('/admin/AksiTambahJenisJasa','MengelolaJenisJasaController@store');
Route::get('/admin/UbahJenisJasa{id_jenisJasa}','MengelolaJenisJasaController@edit');
Route::post('/admin/AksiUbahJenisJasa{id_jenisJasa}','MengelolaJenisJasaController@update');
Route::get('/admin/HapusJenisJasa{id_jenisJasa}','MengelolaJenisJasaController@delete');

Route::get('/admin/MengelolaArea','MengelolaAreaController@indexArea');
Route::get('/admin/MengelolaKoKab','MengelolaAreaController@indexKoKab');
Route::get('/admin/MengelolaProvinsi','MengelolaAreaController@indexProvinsi');

Route::get('/admin/TambahArea','MengelolaAreaController@tambahArea');
Route::post('/admin/AksiTambahArea','MengelolaAreaController@storeArea');
Route::get('/admin/TambahKoKab','MengelolaAreaController@tambahKoKab');
Route::post('/admin/AksiTambahKoKab','MengelolaAreaController@storeKoKab');
Route::get('/admin/TambahProvinsi','MengelolaAreaController@tambahProvinsi');
Route::post('/admin/AksiTambahProvinsi','MengelolaAreaController@storeProvinsi');

Route::get('/admin/UbahArea{id_area}','MengelolaAreaController@edit');
Route::post('/admin/AksiUbahArea{id_area}','MengelolaAreaController@update');
Route::get('/admin/HapusArea{id_area}','MengelolaAreaController@delete');

Route::get('/admin/MengelolaCustomer','MengelolaCustomerController@index');
Route::get('/admin/HapusCustomer{id_customer}','MengelolaCustomerController@delete');

Route::get('/admin/MengelolaOutsourcing','MengelolaOutsourcingController@index');
Route::get('/admin/HapusOutsourcing{id_outsourcing}','MengelolaOutsourcingController@delete');

//----------------------Admin---------------------//

//----------------------TenagaKerja-----------------//
Route::get('/chained_dopdown','AreaController@chained_dopdown');
Route::get('tenagakerja/getKotaKabupaten/{param}', 'AreaController@getKotaKabupaten');

Route::get('/chained_dopdown/getKotaKabupaten/{param}','AreaController@getKotaKabupaten');

Route::get('/chained_dopdown/getArea/{param}','AreaController@getArea');

Route::get('/tenagakerja','TenagakerjaController@index');
Route::get('/tenagakerja/LoginTenagakerja','TenagakerjaController@login');
Route::post('/tenagakerja/AksiLoginTenagakerja','TenagakerjaController@postLogin');
Route::get('/tenagakerja/RegisterTenagakerja','TenagakerjaController@tambah');
Route::get('/logoutTenagaKerja','TenagakerjaController@logout');

Route::get('/tenagakerja/UbahProfilTenagaKerja','TenagaKerjaController@edit');

Route::post('/tenagakerja/AksiTambahTenagakerja','TenagaKerjaController@store');
Route::post('/tenagakerja/AksiUbahTenagakerja{id_tenagaKerja}','TenagaKerjaController@update');

Route::post('/tenagakerja/AksiTambahDataPribadi','DataPribadiController@store');
Route::post('/tenagakerja/AksiUbahDataPribadi{id_data_pribadi}','DataPribadiController@update');

Route::post('/tenagakerja/AksiTambahDataKeluarga','DataKeluargaController@store');
Route::post('/tenagakerja/AksiUbahDataKeluarga{id_data_keluarga}','DataKeluargaController@update');
Route::get('/tenagakerja/HapusDataKeluarga{id_data_keluarga}','DataKeluargaController@delete');

Route::post('/tenagakerja/AksiTambahPddkFormal','PddkFormalController@store');
Route::post('/tenagakerja/AksiUbahPddkFormal{id_pendFormal}','PddkFormalController@update');
Route::get('/tenagakerja/HapusPddkFormal{id_pendFormal}','PddkFormalController@delete');

Route::post('/tenagakerja/AksiTambahPddkNonFormal','PddkNonFormalController@store');
Route::post('/tenagakerja/AksiUbahPddkNonFormal{id_pendNonFormal}','PddkNonFormalController@update');
Route::get('/tenagakerja/HapusPddkNonFormal{id_pendNonFormal}','PddkNonFormalController@delete');

Route::post('/tenagakerja/AksiTambahKeterampilan','KeterampilanController@store');
Route::post('/tenagakerja/AksiUbahKeterampilan{id_keterampilan}','KeterampilanController@update');
Route::get('/tenagakerja/HapusKeterampilan{id_keterampilan}','KeterampilanController@delete');

Route::post('/tenagakerja/AksiTambahPengalamanKerja','PengalamanKerjaController@store');
Route::post('/tenagakerja/AksiUbahPengalamanKerja{id_pengalaman}','PengalamanKerjaController@update');
Route::get('/tenagakerja/HapusPengalamanKerja{id_pengalaman}','PengalamanKerjaController@delete');

Route::get('/tenagakerja/JasaTenagaKerja','TenagaKerjaController@jasa');

//----------------------TenagaKerja-----------------//


//----------------------Outsourcing-----------------//
Route::get('/outsourcing/RegisterOutsourcing','OutsourcingController@tambah');
Route::post('/outsourcing/AksiTambahOutsourcing','OutsourcingController@store');

//----------------------Outsourcing-----------------//


//====================Customer======================//
Route::get('customer/login', function () {
    return view('customer/login');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/pengguna_jasa/index', function () {
    return view('/pengguna_jasa/index');
});

Route::get('/', 'UtamaController@tampil');
Route::get('/index/area/cari', 'UtamaController@cari');
