<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\pendidikan_formalModel;

use Illuminate\Http\Request;
use Session;

class PddkFormalController extends Controller
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
    		'pendidikan' => 'required|max:50',
            'nama_institusi' => 'required|max:50',
            'jurusan' => 'required|max:50',
            'periode_masuk' => 'required|max:50',
            'periode_keluar' => 'required|max:50',
            'lokasi' => 'required|max:100',
    	], $messages);

        $data = new pendidikan_formalModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->pendidikan = $request->pendidikan;
        $data->nama_institusi = $request->nama_institusi;
        $data->jurusan = $request->jurusan;
        $data->periode_masuk  = $request->periode_masuk;
        $data->periode_keluar = $request->periode_keluar;
        $data->lokasi = $request->lokasi;
    	$data->save();

    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pendidikan Formal berhasil ditambahkan!');
    }

    public function update($id_pendFormal, Request $request) {
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
    		'pendidikan' => 'required|max:50',
            'nama_institusi' => 'required|max:50',
            'jurusan' => 'required|max:50',
            'periode_masuk' => 'required|max:50',
            'periode_keluar' => 'required|max:50',
            'lokasi' => 'required|max:100',
    	], $messages);

        $datas = pendidikan_formalModel::find($id_pendFormal);
        $datas->id_tenagaKerja = $request->id_tenagaKerja;
        $datas->pendidikan = $request->pendidikan;
        $datas->nama_institusi = $request->nama_institusi;
        $datas->jurusan = $request->jurusan;
        $datas->periode_masuk  = $request->periode_masuk;
        $datas->periode_keluar = $request->periode_keluar;
        $datas->lokasi = $request->lokasi;
        $datas->save();

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pendidikan Formal berhasil diubah!');
    }

    public function delete($id_pendFormal) {
    	$datas = pendidikan_formalModel::find($id_pendFormal);
    	$datas->delete();
    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pendidikan Formal berhasil dihapus!');
    }
}