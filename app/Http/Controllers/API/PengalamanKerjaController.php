<?php

namespace App\Http\Controllers\API;

use App\pengalaman_kerjaModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PengalamanKerja;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengalamanKerjaController extends Controller
{
    // Mengambil Semua PengalamanKerja
    public function index()
    {
        $pengalamanKerja = pengalaman_kerjaModel::get();
        return PengalamanKerja::collection($pengalamanKerja);
    }

// Membuat PengalamanKerja Baru
    public function store(Request $request)
    {
        $pengalamanKerja = new pengalaman_kerjaModel();
        $pengalamanKerja->id_tenagaKerja = $request->input('id_tenagaKerja');
        $pengalamanKerja->nama_perusahaan = $request->input('nama_perusahaan');
        $pengalamanKerja->periode_masuk = $request->input('periode_masuk');
        $pengalamanKerja->periode_keluar = $request->input('periode_keluar');
        $pengalamanKerja->posisi = $request->input('posisi');
        $pengalamanKerja->gaji = $request->input('gaji');
        $pengalamanKerja->alasan_berhenti = $request->input('alasan_berhenti');

        if($pengalamanKerja->save()) {
            return new PengalamanKerja($pengalamanKerja);
        }
    }
// Mengambil Satu PengalamanKerja
    public function show($id_pengalaman)
    {
        $pengalamanKerja = pengalaman_kerjaModel::findOrFail($id_pengalaman);
        return new PengalamanKerja($pengalamanKerja);
    }
// Mengubah PengalamanKerja
    public function update(Request $request, $id_pengalaman)
    {
        $pengalamanKerja = pengalaman_kerjaModel::findOrFail($id_pengalaman);
        $pengalamanKerja->id_tenagaKerja = $request->input('id_tenagaKerja');
        $pengalamanKerja->nama_perusahaan = $request->input('nama_perusahaan');
        $pengalamanKerja->periode_masuk = $request->input('periode_masuk');
        $pengalamanKerja->periode_keluar = $request->input('periode_keluar');
        $pengalamanKerja->posisi = $request->input('posisi');
        $pengalamanKerja->gaji = $request->input('gaji');
        $pengalamanKerja->alasan_berhenti = $request->input('alasan_berhenti');

        if($pengalamanKerja->save()) {
            return new PengalamanKerja($pengalamanKerja);
        }
    }

    // Menghapus PengalamanKerja
    public function destroy($id_pengalaman)
    {
        $pengalamanKerja = pengalaman_kerjaModel::findOrFail($id_pengalaman);
        if($pengalamanKerja->delete()) {
            return new PengalamanKerja($pengalamanKerja);
        }
    }
}
