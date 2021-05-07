<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\data_keluargaModel;

use Illuminate\Http\Request;
use Session;

class DataKeluargaController extends Controller
{
    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
        ];

    	$this->validate($request, [
    		'nama_keluarga' => 'required|max:50',
            'status_keluarga' => 'required|max:50',
            'pekerjaan' => 'required|max:50',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
    	], $messages);

        $data = new data_keluargaModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->nama_keluarga = $request->nama_keluarga;
        $data->status_keluarga = $request->status_keluarga;
        $data->pekerjaan = $request->pekerjaan;
        $data->ttl = $request->tempat_lahir.', '.$request->tanggal_lahir;
    	$data->save();

    	return redirect('/tenagakerja')->with('alert-success','Data berhasil ditambahkan!');
    }

    public function update($id_tenagaKerja, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
        ];

    	$this->validate($request, [
    		'nama_tenagaKerja' => 'nullable|max:50',
    		'no_ktp' => 'nullable|numeric|digits_between:0,50',
            'email' => 'nullable|email|max:50',
    		'password' => 'nullable|max:255'
    	], $messages);

        $datas = tenaga_kerjaModel::find($id_tenagaKerja);
        $datas->nama_tenagaKerja = $request->nama_tenagaKerja;
        $datas->no_ktp = $request->no_ktp;
        $datas->email = $request->email;        
        $datas->password = bcrypt($request->password);
        $datas->save();

        return redirect('/tenagaKerja')->with('alert-success','Data berhasil diubah!');
    }
}