<?php

namespace App\Http\Controllers\API;

use App\keterampilanModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Keterampilan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KeterampilanController extends Controller
{
    // Mengambil Semua Keterampilan
    public function index()
    {
        $keterampilan = keterampilanModel::get();
        return Keterampilan::collection($keterampilan);
    }

// Membuat Keterampilan Baru
    public function store(Request $request)
    {
        $keterampilan = new keterampilanModel();
        $keterampilan->id_tenagaKerja = $request->input('id_tenagaKerja');
        $keterampilan->nama_keterampilan = $request->input('nama_keterampilan');
        $keterampilan->kemampuan = $request->input('kemampuan');

        if($keterampilan->save()) {
            return new Keterampilan($keterampilan);
        }
    }
// Mengambil Satu Keterampilan
    public function show($id_keterampilan)
    {
        $keterampilan = keterampilanModel::findOrFail($id_keterampilan);
        return new Keterampilan($keterampilan);
    }
// Mengubah Keterampilan
    public function update(Request $request, $id_keterampilan)
    {
        $keterampilan = keterampilanModel::findOrFail($id_keterampilan);
        $keterampilan->id_tenagaKerja = $request->input('id_tenagaKerja');
        $keterampilan->nama_keterampilan = $request->input('nama_keterampilan');
        $keterampilan->kemampuan = $request->input('kemampuan');

        if($keterampilan->save()) {
            return new Keterampilan($keterampilan);
        }
    }

    // Menghapus Keterampilan
    public function destroy($id_keterampilan)
    {
        $keterampilan = keterampilanModel::findOrFail($id_keterampilan);
        if($keterampilan->delete()) {
            return new Keterampilan($keterampilan);
        }
    }
}
