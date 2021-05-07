<?php

namespace App\Http\Controllers\API;

use App\CustomerModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Mengambil Semua Customer
    public function index()
    {
        $customer = CustomerModel::get();
        return Customer::collection($customer);
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
            $customer = CustomerModel::where('email', $request->email)->first();
            if(!Hash::check($request->password, $customer->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //jika berhasil maka login
            $tokenResult = $customer->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'customer' => $customer
            ], 'Authenticated');
        } catch(Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    // public function register (Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'nama_customer' => ['required', 'string', 'max:255'],
    //             'email' => ['required', 'string', 'email', 'max:255', 'unique:customer'],
    //             'password' => ['required', 'string', 'max:255'],
    //             'alamat' => ['required', 'string', 'max:255'],
    //             'no_telp' => ['required', 'string', 'max:255'],

    //         ]);
    //     } catch (){

    //     };
    // }

// Membuat Customer Baru
    public function store(Request $request)
    {
        $customer = new CustomerModel();
        $customer->id_area = $request->input('id_area');
        $customer->nama_customer = $request->input('nama');
        $customer->alamat = $request->input('alamat');
        $customer->no_telp = $request->input('no_telp');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));

        if($customer->save()) {
            return new Customer($customer);
        }
    }
// Mengambil Satu Customer
    public function show($id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        return new Customer($customer);
    }
// Mengubah Customer
    public function update(Request $request, $id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        $customer->nama_customer = $request->input('nama');
        $customer->alamat = $request->input('alamat');
        $customer->no_telp = $request->input('no_telp');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');

        if($customer->save()) {
            return new Customer($customer);
        }
    }
// Menghapus Customer
    public function destroy($id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        if($customer->delete()) {
            return new Customer($customer);
        }
    }
}
