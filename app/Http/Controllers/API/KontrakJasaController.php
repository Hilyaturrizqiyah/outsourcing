<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\kontrak_jasaModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontrakJasaController extends Controller
{
    public function kontrak(Request $request)
    {
        try {
            $request->validate([
                // 'tgl_mulai_kontrak' => ['required'],
                'lama_kontrak' => ['required'],
                'jumlah_tenagaKerja' => ['required'],

            ]);

            $kontrakJasa = kontrak_jasaModel::create([
                // 'tgl_mulai_kontrak' => $request->tgl_mulai_kontrak,
                'id_customer' => Auth::user(),
                'lama_kontrak' => $request->lama_kontrak,
                'jumlah_tenagaKerja' => $request->jumlah_tenagaKerja,
                'status_kontrak' => 'pending',
            ]);

            return ResponseFormatter::success([
                'kontrakJasa' => $kontrakJasa,
            ]);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message'  => 'Something went wrong',
                'error'    => $error
            ], 'Authentication Failed', 500);
        }
    }
}
