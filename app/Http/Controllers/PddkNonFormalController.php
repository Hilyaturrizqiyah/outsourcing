<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\pendidikan_nonFormalModel;

use Illuminate\Http\Request;
use Session;

class PddkNonFormalController extends Controller
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
    		'kursus' => 'required|max:20',
            'nama_institusi' => 'required|max:50',
            'periode_masuk' => 'required|numeric',
            'periode_keluar' => 'required|numeric',
            'lokasi' => 'required|max:100',
    	], $messages);

        $data = new pendidikan_nonFormalModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->kursus = $request->kursus;
        $data->nama_institusi = $request->nama_institusi;
        $data->periode_masuk  = $request->periode_masuk;
        $data->periode_keluar = $request->periode_keluar;
        $data->lokasi = $request->lokasi;
    	$data->save();

    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pendidikan Non Formal berhasil ditambahkan!');
    }

    public function update($id_pendNonFormal, Request $request) {
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
    		'kursus' => 'required|max:20',
            'nama_institusi' => 'required|max:50',
            'periode_masuk' => 'required|numeric',
            'periode_keluar' => 'required|numeric',
            'lokasi' => 'required|max:100',
    	], $messages);

        $datas = pendidikan_nonFormalModel::find($id_pendNonFormal);
        $datas->id_tenagaKerja = $request->id_tenagaKerja;
        $datas->kursus = $request->kursus;
        $datas->nama_institusi = $request->nama_institusi;
        $datas->periode_masuk  = $request->periode_masuk;
        $datas->periode_keluar = $request->periode_keluar;
        $datas->lokasi = $request->lokasi;
    	$datas->save();

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pendidikan Non Formal berhasil diubah!');
    }

    public function delete($id_pendNonFormal) {
    	$datas = pendidikan_nonFormalModel::find($id_pendNonFormal);
    	$datas->delete();
    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pendidikan Non Formal berhasil dihapus!');
    }
}