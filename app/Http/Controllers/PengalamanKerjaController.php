<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\pengalaman_kerjaModel;

use Illuminate\Http\Request;
use Session;

class PengalamanKerjaController extends Controller
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
            'nama_perusahaan' => 'required|max:50',
            'periode_masuk' => 'required|max:50',
            'periode_keluar' => 'required|max:50',
            'posisi' => 'required|max:100',
            'gaji' => 'required|max:100',
            'alasan_berhenti' => 'required|max:100',
    	], $messages);

        $data = new pengalaman_kerjaModel();
        $data->id_tenagaKerja = $request->id_tenagaKerja;
        $data->nama_perusahaan = $request->nama_perusahaan;
        $data->periode_masuk  = $request->periode_masuk;
        $data->periode_keluar = $request->periode_keluar;
        $data->posisi = $request->posisi;
        $data->gaji = $request->gaji;
        $data->alasan_berhenti = $request->alasan_berhenti;
    	$data->save();

    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pengalaman Kerja berhasil ditambahkan!');
    }

    public function update($id_pengalaman, Request $request) {
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
    		'nama_perusahaan' => 'required|max:50',
            'periode_masuk' => 'required|max:50',
            'periode_keluar' => 'required|max:50',
            'posisi' => 'required|max:100',
            'gaji' => 'required|max:100',
            'alasan_berhenti' => 'required|max:100',
    	], $messages);

        $datas = pengalaman_kerjaModel::find($id_pengalaman);
        $datas->id_tenagaKerja = $request->id_tenagaKerja;
        $datas->nama_perusahaan = $request->nama_perusahaan;
        $datas->periode_masuk  = $request->periode_masuk;
        $datas->periode_keluar = $request->periode_keluar;
        $datas->posisi = $request->posisi;
        $datas->gaji = $request->gaji;
        $datas->alasan_berhenti = $request->alasan_berhenti;
    	$datas->save();

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pengalaman Kerja berhasil diubah!');
    }

    public function delete($id_pengalaman) {
    	$datas = pengalaman_kerjaModel::find($id_pengalaman);
    	$datas->delete();
    	return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Pengalaman Kerja berhasil dihapus!');
    }
}