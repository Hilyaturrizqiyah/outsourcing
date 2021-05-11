<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\DataKeluargaModel;

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

        $data = new DataKeluargaModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->nama_keluarga = $request->nama_keluarga;
        $data->status_keluarga = $request->status_keluarga;
        $data->pekerjaan = $request->pekerjaan;
        $data->tempat_lahir  = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
    	$data->save();

    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Keluarga berhasil ditambahkan!');
    }

    public function update($id_data_keluarga, Request $request) {
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

        $datas = DataKeluargaModel::find($id_data_keluarga);
        $datas->id_tenagaKerja = $request->id_tenagaKerja;
        $datas->nama_keluarga = $request->nama_keluarga;
        $datas->status_keluarga = $request->status_keluarga;
        $datas->pekerjaan = $request->pekerjaan;
        $datas->tempat_lahir  = $request->tempat_lahir;
        $datas->tanggal_lahir = $request->tanggal_lahir;
        $datas->save();

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Keluarga berhasil diubah!');
    }

    public function delete($id_data_keluarga) {
    	$datas = DataKeluargaModel::find($id_data_keluarga);
    	$datas->delete();
    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Keluarga berhasil dihapus!');
    }
}