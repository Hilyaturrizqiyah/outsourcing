<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\keterampilanModel;

use Illuminate\Http\Request;
use Session;

class KeterampilanController extends Controller
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
            'nama_keterampilan' => 'required|max:50',
            'kemampuan' => 'required|max:50',
    	], $messages);

        $data = new keterampilanModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->nama_keterampilan = $request->nama_keterampilan;
        $data->kemampuan = $request->kemampuan;
    	$data->save();

    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Keterampilan berhasil ditambahkan!');
    }

    public function update($id_keterampilan, Request $request) {
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
    		'nama_keterampilan' => 'required|max:50',
            'kemampuan' => 'required|max:50',
    	], $messages);

        $datas = keterampilanModel::find($id_keterampilan);
        $datas->id_tenagaKerja = $request->id_tenagaKerja;
        $datas->nama_keterampilan = $request->nama_keterampilan;
        $datas->kemampuan = $request->kemampuan;
    	$datas->save();

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Keterampilan berhasil diubah!');
    }

    public function delete($id_keterampilan) {
    	$datas = keterampilanModel::find($id_keterampilan);
    	$datas->delete();
    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Keterampilan berhasil dihapus!');
    }
}