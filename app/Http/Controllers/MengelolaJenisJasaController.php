<?php

namespace App\Http\Controllers;

use App\JenisJasaModel;
use Illuminate\Http\Request;
use Session;

class MengelolaJenisJasaController extends Controller
{
        public function index()     {

        if(!Session::get('loginAdmin')){
            return redirect('/admin/MengelolaAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        $datas = JenisJasaModel::get();
        	return view('admin.halaman.MengelolaJenisJasa',compact('datas'));
        }
    }


    public function tambah() {

        if(!Session::get('loginAdmin')){
            return redirect('/admin/MengelolaAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	return view('admin.halaman.tambah_data.TambahJenisJasa');
        }
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
            'deskripsi' => 'required|max:190',
    	], $messages);

        $data = new JenisJasaModel();
        $data->nama_jenisJasa = $request->nama_jenisJasa;
        $data->deskripsi = $request->deskripsi;
    	$data->save();

    	return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id_jenisJasa) {

        if(!Session::get('loginAdmin')){
            return redirect('/admin/MengelolaAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = JenisJasaModel::find($id_jenisJasa);
        	return view('admin.halaman.ubah_data.UbahJenisJasa',compact('datas'));
        }
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
            'deskripsi' => 'required|max:190',
        ], $messages);

        $datas = JenisJasaModel::find($id_jenisJasa);
        $datas->nama_jenisJasa = $request->nama_jenisJasa;
        $datas->deskripsi = $request->deskripsi;
        $datas->save();

        return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_jenisJasa) {
    	$datas = JenisJasaModel::find($id_jenisJasa);
    	$datas->delete();
    	return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil dihapus!');
    }


}
