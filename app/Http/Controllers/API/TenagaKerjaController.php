<?php

namespace App\Http\Controllers\API;

use App\tenaga_kerjaModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\TenagaKerja;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenagaKerjaController extends Controller
{
    // Mengambil Semua TenagaKerja
    public function index()
    {
        $tenagaKerja = tenaga_kerjaModel::get();
        return TenagaKerja::collection($tenagaKerja);
    }

// Membuat TenagaKerja Baru
    public function store(Request $request)
    {
        $tenagaKerja = new tenaga_kerjaModel();
        $tenagaKerja->id_area = $request->input('id_area');
        $tenagaKerja->id_jasa = $request->input('id_jasa');
        $tenagaKerja->nama_tenagaKerja = $request->input('nama_tenagaKerja');
        $tenagaKerja->no_ktp = $request->input('no_ktp');
        $tenagaKerja->email = $request->input('email');
        $tenagaKerja->password = $request->input('password');
        $tenagaKerja->status_tenagaKerja = $request->input('status_tenagaKerja');
        $tenagaKerja->foto_profil = $request->input('foto_profil');

        if($tenagaKerja->save()) {
            return new TenagaKerja($tenagaKerja);
        }
    }
// Mengambil Satu TenagaKerja
    public function show($id_tenagakerja)
    {
        $tenagaKerja = tenaga_kerjaModel::findOrFail($id_tenagakerja);
        return new TenagaKerja($tenagaKerja);
    }
// Mengubah TenagaKerja
    public function update(Request $request, $id_tenagakerja)
    {
        $tenagaKerja = tenaga_kerjaModel::findOrFail($id_tenagakerja);
        $tenagaKerja->id_area = $request->input('id_area');
        $tenagaKerja->id_jasa = $request->input('id_jasa');
        $tenagaKerja->nama_tenagaKerja = $request->input('nama_tenagaKerja');
        $tenagaKerja->no_ktp = $request->input('no_ktp');
        $tenagaKerja->email = $request->input('email');
        $tenagaKerja->password = $request->input('password');
        $tenagaKerja->status_tenagaKerja = $request->input('status_tenagaKerja');
        $tenagaKerja->foto_profil = $request->input('foto_profil');

        if($tenagaKerja->save()) {
            return new TenagaKerja($tenagaKerja);
        }
    }

    // Menghapus TenagaKerja
    public function destroy($id_tenagakerja)
    {
        $tenagaKerja = tenaga_kerjaModel::findOrFail($id_tenagakerja);
        if($tenagaKerja->delete()) {
            return new TenagaKerja($tenagaKerja);
        }
    }
}
