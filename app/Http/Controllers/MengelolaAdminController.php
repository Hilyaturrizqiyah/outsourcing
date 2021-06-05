<?php

namespace App\Http\Controllers;

use App\AdminModel;
use Illuminate\Http\Request;
use Session;
use Hash;

class MengelolaAdminController extends Controller
{
    public function login()     {  

        if(Session::get('loginAdmin')){
            return redirect('/admin/MengelolaAdmin')->with('alert-success','Anda sudah login');
        }
        else{

            return view('admin.halaman.LoginAdmin');
        }
    }

    public function postLogin(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = AdminModel::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('nama_admin',$data->nama_admin);
                Session::put('alamat',$data->alamat);
                Session::put('email',$data->email);
                Session::put('no_telp',$data->no_telp);
                
                Session::put('loginAdmin',TRUE);
                return redirect('/admin/MengelolaAdmin');
            }
            else{
                return redirect('admin/LoginAdmin')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('admin/LoginAdmin')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush('loginAdmin');
        return redirect('admin/LoginAdmin')->with('alert-success','Anda sudah logout');
    }


    public function index()     {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $datas = AdminModel::get();
        	return view('admin.halaman.MengelolaAdmin',compact('datas'));
        //}
    }

    public function tambah() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
        	return view('admin.halaman.tambah_data.TambahAdmin');
        //}
    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'harga.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'harga.min' => ':attribute tidak boleh kurang dari 0',
            'maks_tiket.min' => 'tiket tidak boleh kurang dari 0',
            'foto.max' => 'tidak boleh lebih 2 Mb'
        ];

    	$this->validate($request, [
    		'nama_admin' => 'required|max:50',
    		'alamat' => 'required|max:255',
    		'no_telp' => 'required|numeric|digits_between:0,15',
            'email' => 'required|email|max:50',
    		'password' => 'required|max:255'
    	], $messages);

        $data = new AdminModel();
        $data->nama_admin = $request->nama_admin;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->email = $request->email;
        $data->password = $request->password;

    	$data->save();
    	return redirect('/admin/MengelolaAdmin')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id_admin) {

        if(!Session::get('login')){
            return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = AdminModel::find($id_admin);
        	return view('admin.halaman.ubah_data.UbahAdmin',compact('datas'));
        }
    }

    public function update($id_admin, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'harga.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'harga.min' => ':attribute tidak boleh kurang dari 0',
            'maks_tiket.min' => 'tiket tidak boleh kurang dari 0',
            'foto.max' => 'tidak boleh lebih 2 Mb'
        ];

        $this->validate($request, [
            'nama_admin' => 'required|max:50',
    		'alamat' => 'required|max:255',
    		'no_telp' => 'required|numeric|digits_between:0,15',
            'email' => 'required|email|max:50',
    		'password' => 'required|max:255'
        ], $messages);

        $datas = AdminModel::find($id_admin);
        $datas->nama_admin = $request->nama_admin;
        $datas->alamat = $request->alamat;
        $datas->no_telp = $request->no_telp;
        $datas->email = $request->email;
        $datas->password = $request->password;
        $datas->save();

        return redirect('/admin/MengelolaAdmin')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_admin) {
    	$datas = AdminModel::find($id_admin);
    	$datas->delete();
    	return redirect('/admin/MengelolaAdmin')->with('alert-success','Data berhasil dihapus!');
    }


}
