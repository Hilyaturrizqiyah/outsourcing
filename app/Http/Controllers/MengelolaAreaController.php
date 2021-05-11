<?php

namespace App\Http\Controllers;

use App\AreaModel;
use App\provinsiModel;
use App\kota_kabupatenModel;
use Illuminate\Http\Request;
use Session;

class MengelolaAreaController extends Controller
{
    public function indexArea()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $area = AreaModel::get();
        
        	return view('admin.halaman.MengelolaArea',compact('area'));     
        //}  
    }

    public function indexKoKab()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $kota_kabupaten = kota_kabupatenModel::get();         
        	return view('admin.halaman.MengelolaKoKab',compact('kota_kabupaten'));     
        //}  
    }

    public function indexProvinsi()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $provinsi = provinsiModel::get();
        	return view('admin.halaman.MengelolaProvinsi',compact('provinsi'));     
        //}  
    }

    public function tambahArea() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
            $kota_kabupaten = kota_kabupatenModel::get();
        	return view('admin.halaman.tambah_data.TambahArea',compact('kota_kabupaten'));
        //}
    }

    public function tambahKoKab() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
            $provinsi = provinsiModel::get();
        	return view('admin.halaman.tambah_data.TambahKoKab',compact('provinsi'));
        //}
    }

    public function tambahProvinsi() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
            
        	return view('admin.halaman.tambah_data.TambahProvinsi');
        //}
    }

    public function storeArea( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar'
        ];

    	$this->validate($request, [
    		'kotaKabupaten' => 'required|max:100',
            'nama_area' => 'required|max:100',
    	], $messages);

        $data = new AreaModel();
        $data->id_kotaKabupaten = $request->kotaKabupaten;
        $data->nama_area = $request->nama_area;
    	$data->save();

    	return redirect('/admin/MengelolaArea')->with('alert-success','Data area berhasil ditambahkan!');
    }

    public function storeKoKab( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar'
        ];

    	$this->validate($request, [
    		'provinsi' => 'required|max:100',
            'nama_kotaKabupaten' => 'required|max:100',
    	], $messages);

        $data = new kota_kabupatenModel();
        $data->id_provinsi = $request->provinsi;
        $data->nama_kotaKabupaten = $request->nama_kotaKabupaten;
    	$data->save();

    	return redirect('/admin/MengelolaKoKab')->with('alert-success','Data kota Kabupaten berhasil ditambahkan!');
    }

    public function storeProvinsi( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar'
        ];

    	$this->validate($request, [
            'nama_provinsi' => 'required|max:100|unique:provinsi',
    	], $messages);

        $data = new ProvinsiModel();
        $data->nama_provinsi = $request->nama_provinsi;
    	$data->save();

    	return redirect('/admin/MengelolaProvinsi')->with('alert-success','Data provinsi berhasil ditambahkan!');
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
            'id_kotaKabupaten' => 'required|max:100',
            'nama_area' => 'required|max:100',
        ], $messages);

        $datas = AreaModel::find($id_area);
        $datas->id_kotaKabupaten = $request->id_kotaKabupaten;
        $datas->nama_area = $request->nama_area;
        $datas->save();

        return redirect('/admin/MengelolaArea')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_area) {
    	$datas = AreaModel::find($id_area);
    	$datas->delete();
    	return redirect('/admin/MengelolaArea')->with('alert-success','Data berhasil dihapus!');
    }


}
