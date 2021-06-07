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

        return redirect('/customer/loginCustomer')->with('alert-success', 'Kamu Berhasil Register');
    }

    function loginPost(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return (redirect()->intended('customer/DashboardCustomer'));
        } else if (Auth::guard('outsourcing')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('outsourcing/DashboardOutsourcing');
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

    public function update($id_customer, Request $request)
    {
        $messages = [
            // 'required' => ':attribute masih kosong',
            // 'min' => ':attribute diisi minimal :min karakter',
            // 'max' => ':attribute diisi maksimal :max karakter',
            // 'numeric' => ':attribute harus berupa angka',
            // 'unique' => ':attribute sudah ada',
            // 'email' => ':attribute harus berupa email',
            // 'alpha' => ':attribute harus berupa huruf',
            // 'image' => ':attribute harus berupa gambar',
            // 'no_telp.digits_between' => ':attribute diisi antara 1 sampai 15 digit',
            // 'no_telp.min' => ':attribute tidak boleh kurang dari 1'
        ];

        $this->validate($request, [
            // 'nama' => 'nullable|max:50',
            // 'password' => 'nullable|min:8|max:50',
            // 'email' => 'nullable|max:50|email|unique:admin',
            // 'no_telp' => 'nullable|numeric|min:1|digits_between:1,15',
            // 'alamat' => 'nullable|max:255',
        ], $messages);

        $data = CustomerModel::find($id_customer);

        if (empty($request->foto_profil)) {
            $data->foto_profil = $data->foto_profil;
            unlink('pengguna/assets/images/foto_profil/' . $data->foto_profil); //menghapus file lama

        } else {
            $file = $request->file('foto_profil'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('pengguna/assets/images/foto_profil/', $nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto_profil = $nama_file;

        }

        if (empty($request->nama_customer)) {
            $data->nama_customer = $data->nama_customer;
        } else {
            $data->nama_customer = $request->nama_customer;
        }

        if (empty($request->email)) {
            $data->email = $data->email;
        } else {
            $data->email = $request->email;
        }

        if (empty($request->password)) {
            $data->password = $data->password;
        } else {
            $data->password = bcrypt($request->password);
        }

        if (empty($request->no_telp)) {
            $data->no_telp = $data->no_telp;
        } else {
            $data->no_telp = $request->no_telp;
        }

        if (empty($request->alamat)) {
            $data->alamat = $data->alamat;
        } else {
            $data->alamat = $request->alamat;
        }
        $data->save();
        return redirect('customer/ubahProfil')->with('alert-success', 'Data berhasil diubah!');
    }
}
