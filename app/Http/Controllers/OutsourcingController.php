<?php

namespace App\Http\Controllers;

use App\jasaModel;
use App\jenis_jasaModel;
use App\AreaModel;
use App\OutsourcingModel;
use Illuminate\Http\Request;

class OutsourcingController extends Controller
{
    public function tampil(){
        $jasa = jasaModel::all();
        return view('landingpage.halaman.index', compact('jasa'));
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
		return view('landingpage.halaman.index', compact('area'));
	}

    public function tambah() {

        //if(Session::get('loginTenagaKerja')){
        //    return redirect('/tenagakerja')->with('alert-success','Anda sudah login');
       // }
        //else{

            return view('landingpage.halaman.RegisterOutsourcing');
        //}
        
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
        ];

    	$this->validate($request, [
    		'nama_outsourcing' => 'required|max:50',
    		'no_ktp' => 'required|numeric|digits_between:0,17',
            'email' => 'required|email|max:50',
    		'password' => 'required|max:255'
    	], $messages);

        $data = new OutsourcingModel();
        $data->nama_outsourcing = $request->nama_outsourcing;
        $data->no_ktp = $request->no_ktp;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status_outsourcing = "Menunggu Validasi";
    	$data->save();

    	return redirect('/outsourcing/RegisterOutsourcing')->with('alert-success','Data Akun berhasil ditambahkan!');
    }
}
