<?php

namespace App\Http\Controllers\API;

use App\data_pribadiModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataPribadi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataPribadiController extends Controller
{
    // Mengambil Semua DataPribadi
    public function index()
    {
        $dataPribadi = data_pribadiModel::get();
        return DataPribadi::collection($dataPribadi);
    }

// Membuat DataPribadi Baru
    public function store(Request $request)
    {
        $dataPribadi = new data_pribadiModel();
        $dataPribadi->id_tenagaKerja = $request->input('id_tenagaKerja');
        $dataPribadi->no_ktp = $request->input('no_ktp');
        $dataPribadi->nama_lengkap = $request->input('nama_lengkap');
        $dataPribadi->nama_panggilan = $request->input('nama_panggilan');
        $dataPribadi->foto = $request->input('foto');
        $dataPribadi->tempat_lahir = $request->input('tempat_lahir');
        $dataPribadi->tanggal_lahir = $request->input('tanggal_lahir');
        $dataPribadi->alamat_rumah = $request->input('alamat_rumah');
        $dataPribadi->agama = $request->input('agama');
        $dataPribadi->kewarganegaraan = $request->input('kewarganegaraan');
        $dataPribadi->anak_ke = $request->input('anak_ke');
        $dataPribadi->nama_ayah_kandung = $request->input('nama_ayah_kandung');
        $dataPribadi->nama_ibu_kandung = $request->input('nama_ibu_kandung');
        $dataPribadi->status_manikah = $request->input('status_manikah');
        $dataPribadi->status_kepemilikan_rumah = $request->input('status_kepemilikan_rumah');
        $dataPribadi->transportasi = $request->input('transportasi');
        $dataPribadi->no_telp = $request->input('no_telp');

        if($dataPribadi->save()) {
            return new DataPribadi($dataPribadi);
        }
    }
// Mengambil Satu DataPribadi
    public function show($id_data_pribadi)
    {
        $dataPribadi = data_pribadiModel::findOrFail($id_data_pribadi);
        return new DataPribadi($dataPribadi);
    }
// Mengubah DataPribadi
    public function update(Request $request, $id_data_pribadi)
    {
        $dataPribadi = data_pribadiModel::findOrFail($id_data_pribadi);
        $dataPribadi->id_tenagaKerja = $request->input('id_tenagaKerja');
        $dataPribadi->no_ktp = $request->input('no_ktp');
        $dataPribadi->nama_lengkap = $request->input('nama_lengkap');
        $dataPribadi->nama_panggilan = $request->input('nama_panggilan');
        $dataPribadi->foto = $request->input('foto');
        $dataPribadi->tempat_lahir = $request->input('tempat_lahir');
        $dataPribadi->tanggal_lahir = $request->input('tanggal_lahir');
        $dataPribadi->alamat_rumah = $request->input('alamat_rumah');
        $dataPribadi->agama = $request->input('agama');
        $dataPribadi->kewarganegaraan = $request->input('kewarganegaraan');
        $dataPribadi->anak_ke = $request->input('anak_ke');
        $dataPribadi->nama_ayah_kandung = $request->input('nama_ayah_kandung');
        $dataPribadi->nama_ibu_kandung = $request->input('nama_ibu_kandung');
        $dataPribadi->status_manikah = $request->input('status_manikah');
        $dataPribadi->status_kepemilikan_rumah = $request->input('status_kepemilikan_rumah');
        $dataPribadi->transportasi = $request->input('transportasi');
        $dataPribadi->no_telp = $request->input('no_telp');

        if($dataPribadi->save()) {
            return new DataPribadi($dataPribadi);
        }
    }

    // Menghapus DataPribadi
    public function destroy($id_keterampilan)
    {
        $dataPribadi = data_pribadiModel::findOrFail($id_data_pribadi);
        if($dataPribadi->delete()) {
            return new DataPribadi($dataPribadi);
        }
    }
}
