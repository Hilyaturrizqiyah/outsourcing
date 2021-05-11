<?php

namespace App\Http\Controllers;

use App\jasaModel;
use App\jenis_jasaModel;
use App\AreaModel;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    public function tampil(){
        $jasa = jasaModel::all();
        return view('/index', compact('jasa'));
    }

    // public function tampilDetailObat($id_obat)
    // {

    //     $detail     = ModelObat::where('id_obat', $id_obat)->first();

    //     return view('/detailObat', compact('detail'));
    // }

    // public function cariObat(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$cari = $request->cari;

    // 		// mengambil data dari table pegawai sesuai pencarian data
    //     $Obat = ModelObat::where('nama_obat','like',"%".$cari."%")->paginate();

    // 		// mengirim data pegawai ke view index
	// 	return view('/obat', compact('Obat'));
    // }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
        $area = AreaModel::where('nama_area','like',"%".$cari."%")->paginate();

    		// mengirim data pegawai ke view index
		return view('index', compact('area'));
	}
}
