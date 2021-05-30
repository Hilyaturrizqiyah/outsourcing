<?php

namespace App\Http\Controllers\API;

use App\OutsourcingModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Outsourcing;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OutsourcingController extends Controller
{
    public function index()
    {
        $osr = OutsourcingModel::get();
        return Outsourcing::collection($osr);
    }

    public function all(Request $request)
    {
        $id = $request->input('id_outsourcing');
        $limit = $request->input('limit', 6);
        $name = $request->input('nama_outsourcing');
        // $types = $request->input('types');

        // $price_from = $request->input('price_from');
        // $price_to = $request->input('price_to');

        // $rate_from = $request->input('rate_from');
        // $rate_to = $request->input('rate_to');

        if ($id) {
            $osr = OutsourcingModel::find($id);

            if ($osr)
                return ResponseFormatter::success(
                    $osr,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
        }

        $osr = OutsourcingModel::query();

        if ($name)
            $osr->where('nama_outsourcing', 'like', '%' . $name . '%');

        // if ($types)
        //     $osr->where('types', 'like', '%' . $types . '%');

        // if ($price_from)
        //     $osr->where('price', '>=', $price_from);

        // if ($price_to)
        //     $osr->where('price', '<=', $price_to);

        // if ($rate_from)
        //     $osr->where('rate', '>=', $rate_from);

        // if ($rate_to)
        //     $osr->where('rate', '<=', $rate_to);

        return ResponseFormatter::success(
            $osr->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }

    // Membuat Jenis Baru
    public function store(Request $request)
    {
        $osr = new OutsourcingModel();
        $osr->nama_outsourcing = $request->input('nama_outsourcing');

        if($osr->save()) {
            return new Outsourcing($osr);
        }
    }
    // Mengambil Satu Jenis
    public function show($id_outsourcing)
    {
        $osr = OutsourcingModel::findOrFail($id_outsourcing);
        return new Outsourcing($osr);
    }
    // Mengubah Jenis
    public function update(Request $request, $id_outsourcing)
    {
        $osr = OutsourcingModel::findOrFail($id_outsourcing);
        $osr->nama_outsourcing = $request->input('nama_outsourcing');


        if($osr->save()) {
            return new Outsourcing($osr);
        }
    }
    // Menghapus Jenis
    public function destroy($id_outsourcing)
    {
        $osr = OutsourcingModel::findOrFail($id_outsourcing);
        if($osr->delete()) {
            return new Outsourcing($osr);
        }
    }
}
