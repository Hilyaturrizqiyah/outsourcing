<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\JenisJasaModel;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisJasa;
use App\jasaModel;
use Illuminate\Http\Request;

class JenisJasaController extends Controller
{
    // Mengambil Semua jenis
    public function index()
    {
        $jenis = JenisJasaModel::get();
        return JenisJasa::collection($jenis);
    }

    public function all(Request $request)
    {
        $id = $request->input('id_jenisJasa');
        $limit = $request->input('limit', 6);
        $name = $request->input('nama_jenisJasa');
        $types = $request->input('types');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if ($id) {
            $jasa = JenisJasaModel::find($id);

            if ($jasa)
                return ResponseFormatter::success(
                    $jasa,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
        }

        $jasa = JenisJasaModel::query();

        if ($name)
            $jasa->where('nama_jenisJasa', 'like', '%' . $name . '%');

        if ($types)
            $jasa->where('types', 'like', '%' . $types . '%');

        if ($price_from)
            $jasa->where('price', '>=', $price_from);

        if ($price_to)
            $jasa->where('price', '<=', $price_to);

        if ($rate_from)
            $jasa->where('rate', '>=', $rate_from);

        if ($rate_to)
            $jasa->where('rate', '<=', $rate_to);

        return ResponseFormatter::success(
            $jasa->paginate($limit),
            'Data list produk berhasil diambil'
        );
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
