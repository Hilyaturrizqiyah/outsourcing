<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\PasswordValidationRules;
use App\CustomerModel;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use PasswordValidationRules;

    // Mengambil Semua Customer
    public function index()
    {
        $customer = CustomerModel::get();
        return Customer::collection($customer);
    }

    public function login(Request $request)
    {
        try {
            // Validasi Input
            $request->validate([
                'email'     => 'required|email',
                'password'  => 'required',
            ]);

            $customer = CustomerModel::where('email', $request->email)->first();
            if(!$customer || !Hash::check($request->password, $customer->password)){
                return response([
                    'message' => ['Unauthoriezed']
                ], 404);
            }

            // Jika berhasil maka loginkan
            $tokenResult = $customer->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token'  => $tokenResult,
                'token_type'    => 'Bearer',
                'customer'          => $customer
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message'  => 'Something went wrong',
                'error'    => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'nama_customer' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:customer'],
                'password' => ['required'],
                'password_confirmation' => ['same:password'],
                'alamat' => ['required', 'string', 'max:255'],
                'no_telp' => ['required', 'string', 'max:255'],

            ]);

            CustomerModel::create([
                'nama_customer' => $request->nama_customer,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'password' => Hash::make($request->password),
            ]);

            $customer = CustomerModel::where('email', $request->email)->first();

            $tokenResult = $customer->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'customer' => $customer,
            ]);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message'  => 'Something went wrong',
                'error'    => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->customer()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->customer(), 'Data Profile customer berhasil diambil');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $customer = Auth::customer();
        $customer->update($data);

        return ResponseFormatter::success($customer, 'Profile Updated');
    }

    public function updatePhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                ['error' => $validator->errors()],
                'Update photo fails',
                401
            );
        }

        if ($request->file('file')) {
            $file = $request->file->store('assets/img', 'public');

            //simpan foto ke database (urlnya)
            $customer = Auth::customer();
            $customer->profile_photo_path = $file;
            $customer->update();

            return ResponseFormatter::success([$file], 'File Successfully uploaded');
        }
    }



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

        if ($customer->save()) {
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

        if ($customer->save()) {
            return new Customer($customer);
        }
    }
    // Menghapus Customer
    public function destroy($id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        if ($customer->delete()) {
            return new Customer($customer);
        }
    }
}
