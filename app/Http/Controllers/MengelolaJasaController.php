<?php

namespace App\Http\Controllers;

use App\jasaModel;
use App\JenisJasaModel;
use Illuminate\Http\Request;

class MengelolaJasaController extends Controller
{
    public function index(){

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        $jenis_jasa = JenisJasaModel::get();
        $datas = jasaModel::get();
        	return view('outsourcing.MengelolaJasa',compact('datas', 'jenis_jasa'));
    }
    
    // public function chained_dopdown(){

    //     $jenis_jasa = JenisJasaModel::all();
    
    
    //     return view('outsourcing.tambah.chained_dopdown')->with('jenis_jasa',$jenis_jasa);
    
    // }

    public function tambah() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
        	//return view('outsourcing.tambah.TambahJasa');
        //}

        $jenis_jasa = JenisJasaModel::pluck('nama_jenisJasa', 'id_jenisJasa');

        return view('outsourcing.tambah.TambahJasa',['jenis_jasa' => $jenis_jasa,]);
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
            'nama_jasa' => 'required'
    	], $messages);

        $data = new jasaModel();
        $data->nama_jasa = $request->nama_jasa;
        $data->na
    	$data->save();

    	return redirect('/outsourcing/MengelolaJasa')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id_jenisJasa) {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        	$datas = JenisJasaModel::find($id_jasa);
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

        $datas = JenisJasaModel::find($id_jenisJasa);
        $datas->nama_jenisJasa = $request->nama_jenisJasa;
        $datas->save();

        return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_jenisJasa) {
    	$datas = JenisJasaModel::find($id_jenisJasa);
    	$datas->delete();
    	return redirect('/admin/MengelolaJenisJasa')->with('alert-success','Data berhasil dihapus!');
    }
}
