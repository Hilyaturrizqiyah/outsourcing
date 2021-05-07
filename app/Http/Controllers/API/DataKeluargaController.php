<?php

namespace App\Http\Controllers\API;

use App\DataKeluargaModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataKeluarga;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataKeluargaController extends Controller
{
    // Mengambil Semua DataKeluarga
    public function index()
    {
        $dataKeluarga = DataKeluargaModel::get();
        return DataKeluarga::collection($dataKeluarga);
    }

// Membuat DataKeluarga Baru
    public function store(Request $request)
    {
        $dataKeluarga = new DataKeluargaModel();
        $dataKeluarga->id_tenagaKerja = $request->input('id_tenagaKerja');
        $dataKeluarga->nama_keluarga = $request->input('nama_keluarga');
        $dataKeluarga->status_keluarga = $request->input('status_keluarga');
        $dataKeluarga->pekerjaan = $request->input('pekerjaan');
        $dataKeluarga->ttl = $request->input('ttl');

        if($dataKeluarga->save()) {
            return new DataKeluarga($dataKeluarga);
        }
    }
// Mengambil Satu DataKeluarga
    public function show($id_data_keluarga)
    {
        $dataKeluarga = DataKeluargaModel::findOrFail($id_data_keluarga);
        return new DataKeluarga($dataKeluarga);
    }
// Mengubah DataKeluarga
    public function update(Request $request, $id_data_keluarga)
    {
        $dataKeluarga = DataKeluargaModel::findOrFail($id_data_keluarga);
        $dataKeluarga->id_tenagaKerja = $request->input('id_tenagaKerja');
        $dataKeluarga->nama_keluarga = $request->input('nama_keluarga');
        $dataKeluarga->status_keluarga = $request->input('status_keluarga');
        $dataKeluarga->pekerjaan = $request->input('pekerjaan');
        $dataKeluarga->ttl = $request->input('ttl');

        if($dataKeluarga->save()) {
            return new DataKeluarga($dataKeluarga);
        }
    }
}
