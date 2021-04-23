<?php

namespace App\Http\Controllers;

use App\AdminModel;
use Illuminate\Http\Request;
use Session;

class MengelolaAdminController extends Controller
{
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
        $data->nama_admin = $request->nama_admin;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->email = $request->email;        
        $data->password = $request->password;
        $datas->save();

        return redirect('/admin/MengelolaAdmin')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_admin) {
    	$datas = AdminModel::find($id_admin);
    	$datas->delete();
    	return redirect('/admin/MengelolaAdmin')->with('alert-success','Data berhasil dihapus!');
    }


}
