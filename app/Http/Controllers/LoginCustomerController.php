<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class LoginCustomerController extends Controller
{
    public function index()
    {
        // if (!Session::get('loginCustomer')) {
        //     return redirect('/customer/loginCustomer')->with('alert', 'Kamu harus login dulu');
        // } else {

            return view('/customer/DashboardCustomer');
        // }
    }

    public function loginCustomer()
    {
        return view('/customer/loginCustomer');
    }

    // public function loginCustomerPost(Request $request)
    // {

    //     $email = $request->email;
    //     $password = $request->password;

    //     $data = CustomerModel::where('email', $email)->first();
    //     if ($data) { //apakah email tersebut ada atau tidak
    //         if (Hash::check($password, $data->password)) {
    //             Session::put('id_customer', $data->id_customer);
    //             Session::put('nama_customer', $data->nama_customer);
    //             Session::put('email', $data->email);

    //             Session::put('loginCustomerPost', TRUE);
    //             return redirect('/customer/DashboardCustomer');
    //         } else {
    //             return redirect('/customer/loginCustomer')->with('alert', 'Password atau Email, Salah !');
    //         }
    //     } else {
    //         return redirect('/customer/loginCustomer')->with('alert', 'Password atau Email, Salah!');
    //     }
    // }


    public function registerCustomer()
    {
        return view('/customer/register');
    }

    public function registerCustomerPost(Request $request)
    {
        $this->validate($request, [
            'nama_customer' => 'required|min:4',
            'no_telp' => 'required|min:4',
            'alamat' => 'required|min:4',
            'email' => 'required|min:4',
            'password' => 'required',
            // 'confirmation' => 'required|same:password',

        ], [
            'nama_customer.required' => 'Nama harus diisi dengan lengkap',
            'no_telp.required' => 'No HP harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            // 'confirmation.required' => 'Isi dengan password yang sama',
        ]);

        $data =  new CustomerModel();
        $data->nama_customer = $request->nama_customer;
        $data->no_telp = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $data->save();

        return redirect('/customer/loginCustomer')->with('alert', 'Kamu Berhasil Register');
    }

    // public function logout()
    // {
    //     Session::flush();
    //     return redirect('/customer/loginCustomer')->with('alert', 'Kamu sudah logout');
    // }

    function loginPost(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return (redirect()->intended('customer/DashboardCustomer'));
        } else if (Auth::guard('outsourcing')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('outsourcing/DashboardOsr');
        } else if (Auth::guard('tenagaKerja')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('tenagakerja/ProfilTenagaKerja');
        } else {
            //Gagal Login
            return redirect('customer/loginCustomer')->with('alert', 'Password atau Email, Salah !');
        }
    }

    function logout()
    {
        if (Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        } else if (Auth::guard('outsourcing')->check()) {
            Auth::guard('outsourcing')->logout();
        } else if (Auth::guard('tenagaKerja')->check()) {
            Auth::guard('tenagaKerja')->logout();
        }
        return redirect('customer/loginCustomer')->with('alert-success', 'Kamu sudah logout');
    }
}
