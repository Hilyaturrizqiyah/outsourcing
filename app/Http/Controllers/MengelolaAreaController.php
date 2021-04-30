<?php

namespace App\Http\Controllers;

use App\AreaModel;
use Illuminate\Http\Request;
use Session;

class MengelolaAreaController extends Controller
{
        public function index()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $datas = AreaModel::get();         
        	return view('admin.halaman.MengelolaArea',compact('datas'));     
        //}  
    }

    public function tambah() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
        	return view('admin.halaman.tambah_data.TambahArea');
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
    		'provinsi' => 'required|max:100',
            'kota_kabupaten' => 'required|max:100',
            'kecamatan' => 'required|max:100',
    	], $messages);

        $data = new AreaModel();
        $data->provinsi = $request->provinsi;
        $data->kota_kabupaten = $request->kota_kabupaten;
        $data->kecamatan = $request->kecamatan;
    	$data->save();

    	return redirect('/admin/MengelolaArea')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id_area) {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        	$datas = AreaModel::find($id_area);
        	return view('admin.halaman.ubah_data.UbahArea',compact('datas'));
        //}
    }

    public function update($id_area, Request $request) {
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
            'provinsi' => 'required|max:100',
            'kota_kabupaten' => 'required|max:100',
            'kecamatan' => 'required|max:100',
        ], $messages);

        $datas = AreaModel::find($id_area);
        $datas->provinsi = $request->provinsi;
        $datas->kota_kabupaten = $request->kota_kabupaten;
        $datas->kecamatan = $request->kecamatan;
        $datas->save();

        return redirect('/admin/MengelolaArea')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_area) {
    	$datas = AreaModel::find($id_area);
    	$datas->delete();
    	return redirect('/admin/MengelolaArea')->with('alert-success','Data berhasil dihapus!');
    }


}
