<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\data_pribadiModel;

use Illuminate\Http\Request;
use Session;

class DataPribadiController extends Controller
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
    		'no_ktp' => 'required|max:50',
            'nama_lengkap' => 'required|max:50',
            'nama_panggilan' => 'required|max:50',
            'foto' => 'required|max:190',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat_rumah' => 'required|max:100',
            'no_telp' => 'required|max:50',
            'agama' => 'required|max:50',
            'kewarganegaraan' => 'required|max:50',
            'anak_ke' => 'required|numeric',
            'nama_ayah_kandung' => 'required|max:50',
            'nama_ibu_kandung' => 'required|max:50',
            'status_menikah' => 'required|max:50',
            'status_kepemilikan_rumah' => 'required|max:50',
            'transportasi' => 'required|max:50',
    	], $messages);

        $data = new data_pribadiModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->no_ktp = $request->no_ktp;
        $data->nama_lengkap = $request->nama_lengkap;
        $data->nama_panggilan = $request->nama_panggilan;
        $data->foto = $request->foto;
        $data->tempat_lahir  = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat_rumah = $request->alamat_rumah;
        $data->no_telp = $request->no_telp;
        $data->agama = $request->agama;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->anak_ke = $request->anak_ke;
        $data->nama_ayah_kandung = $request->nama_ayah_kandung;
        $data->nama_ibu_kandung = $request->nama_ibu_kandung;
        $data->status_menikah = $request->status_menikah;
        $data->status_kepemilikan_rumah = $request->status_kepemilikan_rumah;
        $data->transportasi = $request->transportasi;
    	$data->save();

    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pribadi berhasil ditambahkan!');
    }

    public function update($id_data_pribadi, Request $request) {
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
    		'no_ktp' => 'required|max:50',
            'nama_lengkap' => 'required|max:50',
            'nama_panggilan' => 'required|max:50',
            'foto' => 'required|max:190',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat_rumah' => 'required|max:100',
            'no_telp' => 'required|max:50',
            'agama' => 'required|max:50',
            'kewarganegaraan' => 'required|max:50',
            'anak_ke' => 'required|numeric',
            'nama_ayah_kandung' => 'required|max:50',
            'nama_ibu_kandung' => 'required|max:50',
            'status_menikah' => 'required|max:50',
            'status_kepemilikan_rumah' => 'required|max:50',
            'transportasi' => 'required|max:50',
    	], $messages);

        $data = data_pribadiModel::find($id_data_pribadi);
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->no_ktp = $request->no_ktp;
        $data->nama_lengkap = $request->nama_lengkap;
        $data->nama_panggilan = $request->nama_panggilan;
        $data->foto = $request->foto;
        $data->tempat_lahir  = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->alamat_rumah = $request->alamat_rumah;
        $data->no_telp = $request->no_telp;
        $data->agama = $request->agama;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->anak_ke = $request->anak_ke;
        $data->nama_ayah_kandung = $request->nama_ayah_kandung;
        $data->nama_ibu_kandung = $request->nama_ibu_kandung;
        $data->status_menikah = $request->status_menikah;
        $data->status_kepemilikan_rumah = $request->status_kepemilikan_rumah;
        $data->transportasi = $request->transportasi;
        $data->save();

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pribadi berhasil diubah!');
    }

    public function delete($id_data_pribadi) {
    	$datas = data_pribadiModel::find($id_data_pribadi);
    	$datas->delete();
    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pribadi berhasil dihapus!');
    }
}