<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\jenis_jasa;
use App\jenis_jasaModel;
use Illuminate\Http\Request;

class jenis_jasaController extends Controller
{
    // Mengambil Semua Artikel
    public function index()
    {
        $jenis_jasa = jenis_jasaModel::get();
        return jenis_jasa::collection($jenis_jasa);
    }
    // Membuat Artikel Baru
    public function store(Request $request)
    {
        $jenis_jasa = new jenis_jasaModel();
        $jenis_jasa->nama_jenisJasa = $request->input('nama_jenisJasa');


        if ($jenis_jasa->save()) {
            return new jenis_jasa($jenis_jasa);
        }
    }
    // Mengambil Satu Artikel
    public function show($id_jenisJasa)
    {
        $jenis_jasa = jenis_jasaModel::findOrFail($id_jenisJasa);
        return new jenis_jasa($jenis_jasa);
    }
    // Mengubah Artikel
    public function update(Request $request, $id_jenisJasa)
    {
        $jenis_jasa = jenis_jasaModel::findOrFail($id_jenisJasa);
        $jenis_jasa->nama_jenisJasa = $request->input('nama_jenisJasa');


        if ($jenis_jasa->save()) {
            return new jenis_jasa($jenis_jasa);
        }
    }
    // Menghapus Artikel
    public function destroy($id_jenisJasa)
    {
        $jenis_jasa = jenis_jasaModel::findOrFail($id_jenisJasa);
        if ($jenis_jasa->delete()) {
            return new jenis_jasa($jenis_jasa);
        }
    }
}
