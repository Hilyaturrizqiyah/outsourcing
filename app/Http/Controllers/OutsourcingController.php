<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\jasaModel;
use App\JenisJasaModel;
use App\komplainModel;
use App\kontrak_jasaModel;
use App\OutsourcingModel;
use App\Biaya_perlengkapanModel;
use App\biaya_tenagaModel;
use App\detail_komplainModel;
use App\tenaga_kerjaModel;
use App\PembayaranTenagaKerjaModel;
use App\PembayaranPerlengkapanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OutsourcingController extends Controller
{
    public function index()
    {
        $osr = OutsourcingModel::all();

        return view('/outsourcing/DashboardOutsourcing', compact('osr'));
    }

    public function ubahProfil()
    {
        $id_outsourcing = Session::get('id_outsourcing');
        $datas = OutsourcingModel::find($id_outsourcing);

        return view('/outsourcing/ubahProfil', compact('datas', 'id_outsourcing'));
    }

    // public function jasa(){
    //     $jasa = jasaModel::all();
    //     return view('/outsourcing/MengelolaJasa', compact('jasa'));
    // }

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


    public function tampilRiwayatPengajuan()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->where('status_kontrak', 'Pending')->orWhere('status_kontrak', 'Kontrak Disetujui')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->get();
        //Proses pembatalan dalam 1 hari
        $now = Carbon::now();
        $progres = kontrak_jasaModel::with('jasa')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->where('status_kontrak', 'Kontrak Disetujui')->get();


        foreach ($progres as $mulai) {
            if ($mulai->tgl_mulai_kontrak < $now) {
                $mulai->status_kontrak = "In Progress";
                $mulai->save();
            }
            $selisih_hari = $mulai->created_at->diffInDays($now);
            if ($selisih_hari >= 1 && $mulai->status_kontrak == "Kontrak Disetujui") {
                $update_mulai = kontrak_jasaModel::find($mulai->id_kontrak);
                $update_mulai->status_kontrak = "In Progress";
                $update_mulai->save();
            }
        }

        $btl = kontrak_jasaModel::with('jasa')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->where('status_kontrak', 'Pending')->get();


        foreach ($btl as $batal) {
            if ($now > $batal->tgl_mulai_kontrak) {
                $batal->status_kontrak = "Cancel";
                $batal->save();
            }
            $selisih_hari = $batal->created_at->diffInDays($now);
            if ($selisih_hari >= 1 && $batal->status_kontrak == "Pending") {
                $update_batal = kontrak_jasaModel::find($batal->id_kontrak);
                $update_batal->status_kontrak = "Cancel";
                $update_batal->save();
            }
        }
        return view('/outsourcing/MengelolaKontrak', compact('kontraks', 'now', 'progres'));
    }

    public function tampilRiwayatProgress()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->where('status_kontrak', 'In Progress')->orderBy('tgl_mulai_kontrak', 'asc')->get();

        return view('/outsourcing/MengelolaKontrak', compact('kontraks'));
    }

    public function tampilRiwayatFinish()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->where('status_kontrak', 'Finish')->orWhere('status_kontrak', 'Cancel')->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->get();

        return view('/outsourcing/MengelolaKontrak', compact('kontraks'));
    }

    // public function tampilDetailRiwayat($id_kontrak)
    // {
    //     $id_outsourcing = Session::get('id_outsourcing');
    //     $datas = OutsourcingModel::find($id_outsourcing);
    //     $kontraks     = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->first();
    //     $pembayaranP = PembayaranPerlengkapanModel::where('id_kontrak', $id_kontrak)->first();

    //     return view('/outsourcing/MengelolaKontrak', compact('kontraks', 'datas', 'id_outsourcing','pembayaranP'));
    // }

    public function riwayatKomplain()
    {
        $komplain    = komplainModel::where('id_kontrak', Auth::guard('outsourcing')->user()->id_outsourcing)->get();
        $kontrak     = kontrak_jasaModel::all();
        $outsourcing = OutsourcingModel::all();

        return view('/outsourcing/MengelolaDataKomplain', compact('komplain', 'kontrak', 'outsourcing'));
    }

    public function tampilDetailKomplain($id_komplain)
    {
        $komplain     = komplainModel::where('id_komplain', $id_komplain)->where('id_outsourcing', Auth::guard('outsourcing')->user()->id_outsourcing)->get();
        $detail_komplain = detail_komplainModel::where('id_komplain', $id_komplain)->first();

        return view('/customer/komplainDetail', compact('komplain', 'detail_komplain'));
    }
}
