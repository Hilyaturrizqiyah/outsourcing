<?php

namespace App\Http\Controllers\API;

use App\pendidikan_formalModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\PendidikanFormal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendidikanFormalController extends Controller
{
    // Mengambil Semua PendidikanFormal
    public function index()
    {
        $pendidikanFormal = pendidikan_formalModel::get();
        return PendidikanFormal::collection($pendidikanFormal);
    }

// Membuat PendidikanFormal Baru
    public function store(Request $request)
    {
        $pendidikanFormal = new pendidikan_formalModel();
        $pendidikanFormal->id_tenagaKerja = $request->input('id_tenagaKerja');
        $pendidikanFormal->pendidikan = $request->input('pendidikan');
        $pendidikanFormal->nama_institusi = $request->input('nama_institusi');
        $pendidikanFormal->jurusan = $request->input('jurusan');
        $pendidikanFormal->periode_masuk = $request->input('periode_masuk');
        $pendidikanFormal->periode_keluar = $request->input('periode_keluar');
        $pendidikanFormal->lokasi = $request->input('lokasi');

        if($pendidikanFormal->save()) {
            return new PendidikanFormal($pendidikanFormal);
        }
    }
// Mengambil Satu PendidikanFormal
    public function show($id_pendFormal)
    {
        $pendidikanFormal = pendidikan_formalModel::findOrFail($id_pendFormal);
        return new PendidikanFormal($pendidikanFormal);
    }
// Mengubah PendidikanFormal
    public function update(Request $request, $id_pendFormal)
    {
        $pendidikanFormal = pendidikan_formalModel::findOrFail($id_pendFormal);
        $pendidikanFormal->id_tenagaKerja = $request->input('id_tenagaKerja');
        $pendidikanFormal->pendidikan = $request->input('pendidikan');
        $pendidikanFormal->nama_institusi = $request->input('nama_institusi');
        $pendidikanFormal->jurusan = $request->input('jurusan');
        $pendidikanFormal->periode_masuk = $request->input('periode_masuk');
        $pendidikanFormal->periode_keluar = $request->input('periode_keluar');
        $pendidikanFormal->lokasi = $request->input('lokasi');

        if($pendidikanFormal->save()) {
            return new PendidikanFormal($pendidikanFormal);
        }
    }

    // Menghapus PendidikanFormal
    public function destroy($id_pendFormal)
    {
        $pendidikanFormal = pendidikan_formalModel::findOrFail($id_pendFormal);
        if($pendidikanFormal->delete()) {
            return new PendidikanFormal($pendidikanFormal);
        }
    }

}
