<?php

namespace App\Http\Controllers\API;

use App\pendidikan_nonFormalModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PendidikanNonFormal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendidikanNonFormalController extends Controller
{
    // Mengambil Semua PendidikanNonFormal
    public function index()
    {
        $pendidikanNonFormal = pendidikan_nonFormalModel::get();
        return PendidikanNonFormal::collection($pendidikanNonFormal);
    }

// Membuat PendidikanNonFormal Baru
    public function store(Request $request)
    {
        $pendidikanNonFormal = new pendidikan_nonFormalModel();
        $pendidikanNonFormal->id_tenagaKerja = $request->input('id_tenagaKerja');
        $pendidikanNonFormal->kursus = $request->input('kursus');
        $pendidikanNonFormal->nama_institusi = $request->input('nama_institusi');
        $pendidikanNonFormal->periode_masuk = $request->input('periode_masuk');
        $pendidikanNonFormal->periode_keluar = $request->input('periode_keluar');
        $pendidikanNonFormal->lokasi = $request->input('lokasi');

        if($pendidikanNonFormal->save()) {
            return new PendidikanNonFormal($pendidikanNonFormal);
        }
    }
// Mengambil Satu PendidikanNonFormal
    public function show($id_pendNonFormal)
    {
        $pendidikanNonFormal = pendidikan_nonFormalModel::findOrFail($id_pendNonFormal);
        return new PendidikanNonFormal($pendidikanNonFormal);
    }
// Mengubah PendidikanNonFormal
    public function update(Request $request, $id_pendNonFormal)
    {
        $pendidikanNonFormal = pendidikan_nonFormalModel::findOrFail($id_pendNonFormal);
        $pendidikanNonFormal->id_tenagaKerja = $request->input('id_tenagaKerja');
        $pendidikanNonFormal->kursus = $request->input('kursus');
        $pendidikanNonFormal->nama_institusi = $request->input('nama_institusi');
        $pendidikanNonFormal->periode_masuk = $request->input('periode_masuk');
        $pendidikanNonFormal->periode_keluar = $request->input('periode_keluar');
        $pendidikanNonFormal->lokasi = $request->input('lokasi');

        if($pendidikanNonFormal->save()) {
            return new PendidikanNonFormal($pendidikanNonFormal);
        }
    }

// Menghapus PendidikanNonFormal
    public function destroy($id_pendNonFormal)
    {
        $pendidikanNonFormal = pendidikan_nonFormalModel::findOrFail($id_pendNonFormal);
        if($pendidikanNonFormal->delete()) {
            return new PendidikanNonFormal($pendidikanNonFormal);
        }
    }
}
