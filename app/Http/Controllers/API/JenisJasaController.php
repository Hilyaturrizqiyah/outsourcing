<?php

namespace App\Http\Controllers\API;

use App\JenisJasaModel;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisJasa;
use Illuminate\Http\Request;

class JenisJasaController extends Controller
{
    // Mengambil Semua jenis
    public function index()
    {
        $jenis = JenisJasaModel::get();
        return JenisJasa::collection($jenis);
    }
    // Membuat Jenis Baru
    public function store(Request $request)
    {
        $jenis = new JenisJasaModel();
        $jenis->nama = $request->input('nama_jenisJasa');

        if($jenis->save()) {
            return new JenisJasa($jenis);
        }
    }
    // Mengambil Satu Jenis
    public function show($id_jenisjasa)
    {
        $jenis = JenisJasaModel::findOrFail($id_jenisjasa);
        return new JenisJasa($jenis);
    }
    // Mengubah Jenis
    public function update(Request $request, $id_jenisjasa)
    {
        $jenis = JenisJasaModel::findOrFail($id_jenisjasa);
        $jenis->nama = $request->input('nama_jenisJasa');


        if($jenis->save()) {
            return new JenisJasa($jenis);
        }
    }
    // Menghapus Jenis
    public function destroy($id_jenisjasa)
    {
        $jenis = JenisJasaModel::findOrFail($id_jenisjasa);
        if($jenis->delete()) {
            return new JenisJasa($jenis);
        }
    }
}
