<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;
use Session;
use Hash;

class LoginCustomerController extends Controller
{
    public function index()
    {
        if (!Session::get('loginCustomer')) {
            return redirect('/customer/loginCustomer')->with('alert', 'Kamu harus login dulu');
        } else {

            return view('/customer/DashboardCustomer');
        }
    }

    public function loginCustomer()
    {
        return view('/customer/loginCustomer');
    }

    public function loginCustomerPost(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $data = CustomerModel::where('email', $email)->first();
        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('id_customer', $data->id_customer);
                Session::put('nama_customer', $data->nama_customer);
                Session::put('email', $data->email);

                Session::put('loginCustomerPost', TRUE);
                return redirect('/customer/DashboardCustomer');
            } else {
                return redirect('/customer/loginCustomer')->with('alert', 'Password atau Email, Salah !');
            }
        } else {
            return redirect('/customer/loginCustomer')->with('alert', 'Password atau Email, Salah!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/customer/loginCustomer')->with('alert', 'Kamu sudah logout');
    }
}
