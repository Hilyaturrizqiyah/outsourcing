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
    // Mengambil Semua Outsourcing
    public function index()
    {
        $outsourcing = OutsourcingModel::get();
        return Outsourcing::collection($outsourcing);
    }

    public function login(Request $request)
    {
        try {
            //validasi input
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            //mengecek credentials (login)
            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            //jika hash tidak sesuai maka error
            $outsourcing = OutsourcingModel::where('email', $request->email)->first();
            if(!Hash::check($request->password, $outsourcing->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //jika berhasil maka login
            $tokenResult = $outsourcing->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'outsourcing' => $outsourcing
            ], 'Authenticated');
        } catch(Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

// Membuat Outsourcing Baru
    public function store(Request $request)
    {
        $outsourcing = new OutsourcingModel();
        $outsourcing->id_area = $request->input('id_area');
        $outsourcing->id_admin = $request->input('id_admin');
        $outsourcing->nama_outsourcing = $request->input('nama');
        $outsourcing->alamat = $request->input('alamat');
        $outsourcing->no_telp = $request->input('no_telp');
        $outsourcing->nama_pemilikRekening = $request->input('pemilikRekening');
        $outsourcing->nama_bank = $request->input('bank');
        $outsourcing->no_rekening = $request->input('no_rekening');
        $outsourcing->email = $request->input('email');
        $outsourcing->password = Hash::make($request->input('password'));

        if($outsourcing->save()) {
            return new Outsourcing($outsourcing);
        }
    }
// Mengambil Satu Outsourcing
    public function show($id_outsourcing)
    {
        $outsourcing = OutsourcingModel::findOrFail($id_outsourcing);
        return new Outsourcing($outsourcing);
    }
// Mengubah Outsourcing
    public function update(Request $request, $id_outsourcing)
    {
        $outsourcing = OutsourcingModel::findOrFail($id_outsourcing);
        $outsourcing->id_area = $request->input('id_area');
        $outsourcing->id_admin = $request->input('id_admin');
        $outsourcing->nama_outsourcing = $request->input('nama');
        $outsourcing->alamat = $request->input('alamat');
        $outsourcing->no_telp = $request->input('no_telp');
        $outsourcing->nama_pemilikRekening = $request->input('pemilikRekening');
        $outsourcing->nama_bank = $request->input('bank');
        $outsourcing->no_rekening = $request->input('no_rekening');
        $outsourcing->email = $request->input('email');
        $outsourcing->password = $request->input('password');

        if($outsourcing->save()) {
            return new Outsourcing($outsourcing);
        }
    }
// Menghapus Outsourcing
    public function destroy($id_outsourcing)
    {
        $outsourcing = OutsourcingModel::findOrFail($id_outsourcing);
        if($outsourcing->delete()) {
            return new Outsourcing($outsourcing);
        }
    }
}
