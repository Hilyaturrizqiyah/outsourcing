<?php

namespace App\Http\Controllers;

use App\jenis_jasaModel;
use Illuminate\Http\Request;
use Session;

class MengelolaJenisJasaController extends Controller
{
        public function index()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $datas = jenis_jasaModel::get();         
        	return view('admin.halaman.MengelolaJenisJasa',compact('datas'));     
        //}  
    }

    public function tambah() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
        	return view('admin.halaman.tambah_data.TambahJenisJasa');
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
    		'nama_jenisJasa' => 'required|max:50',
    	], $messages);

        $data = new jenis_jasaModel();
        $data->nama_jenisJasa = $request->nama_jenisJasa;
    	$data->save();

    	return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id_jenisJasa) {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        	$datas = jenis_jasaModel::find($id_jenisJasa);
        	return view('admin.halaman.ubah_data.UbahJenisJasa',compact('datas'));
        //}
    }

    public function update($id_jenisJasa, Request $request) {
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
            'nama_jenisJasa' => 'required|max:50',
        ], $messages);

        $datas = jenis_jasaModel::find($id_jenisJasa);
        $datas->nama_jenisJasa = $request->nama_jenisJasa;
        $datas->save();

        return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_jenisJasa) {
    	$datas = jenis_jasaModel::find($id_jenisJasa);
    	$datas->delete();
    	return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil dihapus!');
    }


}
