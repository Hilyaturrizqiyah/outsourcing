<?php

namespace App\Http\Controllers;

use App\Biaya_perlengkapanModel;
use App\biaya_tenagaModel;
use App\CustomerModel;
use App\detail_komplainModel;
use App\jasaModel;
use App\JenisJasaModel;
use App\komplainModel;
use App\kontrak_jasaModel;
use App\OutsourcingModel;
use App\tenaga_kerjaModel;
use App\PembayaranTenagaKerjaModel;
use App\PembayaranPerlengkapanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Session;

class CustomerController extends Controller
{
    public function index()
    {
        $jenisjasa = JenisJasaModel::all();
        $jasa = jasaModel::all();

        $now = Carbon::now()->format('y-m-d');
        $progres = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Kontrak Disetujui')->get();

        foreach ($progres as $mulai) {
            if ($mulai->tgl_mulai_kontrak < $now) {
                $mulai->status_kontrak = "In Progress";
                // dd($mulai);
                $mulai->save();
            }
            $selisih_hari = $mulai->created_at->diffInDays($now);

            if ($selisih_hari >= 1 && $mulai->status_kontrak == "Kontrak Disetujui") {
                $update_mulai = kontrak_jasaModel::find($mulai->id_kontrak);
                $update_mulai->status_kontrak = "In Progress";
                $update_mulai->save();
            }
        }

        return view('/customer/DashboardCustomer', compact('jenisjasa', 'jasa', 'now', 'progres'));
    }

    public function cariJasa(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cariJasa;

        // mengambil data dari table pegawai sesuai pencarian data
        $jasa = jasaModel::where('nama_jasa', 'like', "%" . $cari . "%")->paginate();

        // mengirim data pegawai ke view index
        return view('/customer/DashboardCustomer', compact('jasa'));
    }

    public function tampilDetailJasa($id_jasa)
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $jasa     = jasaModel::where('id_jasa', $id_jasa)->first();

        return view('/customer/detailJasa', compact('jasa', 'datas', 'id_customer'));
    }

    public function formKontrak($id_jasa)
    {
        $biaya_tenaga     = biaya_tenagaModel::where('id_jasa', $id_jasa)->first();
        $biaya_perlengkapan = Biaya_perlengkapanModel::where('id_jasa', $id_jasa)->get();
        $outsourcing    = OutsourcingModel::all();

        return view('/customer/formKontrak', compact('outsourcing', 'biaya_tenaga', 'biaya_perlengkapan'));
    }

    public function tambahFormKontrak(Request $request, $id_jasa)
    {
        $this->validate($request, [
            'tgl_mulai_kontrak' => 'required',
            'lamaKontrak' => 'required',
            'jumlah_tenagaKerja' => 'required'
        ], [
            'tgl_mulai_kontrak.required' => '*Harus isi terlebih dahulu',
            'lama_kontrak.required' => '*Harus isi terlebih dahulu',
            'jumlah_tenagaKerja.required' => '*Harus isi terlebih dahulu',
        ]);

        $jasa     = jasaModel::where('id_jasa', $id_jasa)->get();
        $biaya_tenaga   = biaya_tenagaModel::where('id_jasa', $id_jasa)->first();

        $kontrak    = new kontrak_jasaModel;
        $kontrak->id_jasa = $biaya_tenaga->jasa->id_jasa;
        $kontrak->id_customer = Auth::guard('customer')->user()->id_customer;
        $kontrak->id_outsourcing = $biaya_tenaga->jasa->outsourcing->id_outsourcing;
        $kontrak->tgl_mulai_kontrak = $request->tgl_mulai_kontrak;
        $kontrak->lama_kontrak = $request->lamaKontrak;
        $kontrak->jumlah_tenagaKerja = $request->jumlah_tenagaKerja;
        $kontrak->jumlah_biayaTenagaKerja = $biaya_tenaga->biaya * $request->jumlah_tenagaKerja;
        $kontrak->jumlah_biayaPerlengkapan = $request->jumlah_biayaPerlengkapan;
        $kontrak->status_kontrak = "Pending";
        $kontrak->save();

        //---Rizqi---
        //---Pembayaran TenagaKerja untuk bulan ke1----
        $idKontrak = $kontrak->id_kontrak;
        $pembayaranTK = new PembayaranTenagaKerjaModel;
        $pembayaranTK->id_outsourcing = $kontrak->id_outsourcing;
        $pembayaranTK->id_kontrak = $idKontrak;
        $pembayaranTK->nama_pembayaran = "Pembayaran Kontrak bulan ke 1";
        $pembayaranTK->nominal = $request->jumlah_biayaTenagaKerja;
        $pembayaranTK->bulan_ke = 1;
        $pembayaranTK->status_bayar = "Menunggu Pembayaran";
        $pembayaranTK->save();
        //---Pembayaran TenagaKerja ----

        if ($request->jumlah_biayaPerlengkapan != "") {
            //---Pembayaran Perlengkapan untuk bulan ke1----
            $pembayaranP = new PembayaranPerlengkapanModel;
            $pembayaranP->id_outsourcing = $kontrak->id_outsourcing;
            $pembayaranP->id_kontrak = $idKontrak;
            $pembayaranP->nama_pembayaran = "Pembayaran Perlengkapan";
            $pembayaranP->nominal = $request->jumlah_biayaPerlengkapan;
            $pembayaranP->status_bayar = "Menunggu Pembayaran";
            $pembayaranP->save();
            //---Pembayaran Perlengkapan ----
        }
        //---Rizqi---


        return redirect('/customer/riwayatSewa')->with('alert-success', 'Pengajuan Kontrak Berhasil');
    }

    public function tampilRiwayatPengajuan()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Pending')
            ->orWhere('status_kontrak', 'Menunggu Pembayaran')->where('id_customer', Auth::guard('customer')->user()->id_customer)
            ->orWhere('status_kontrak', 'Kontrak Disetujui')->where('id_customer', Auth::guard('customer')->user()->id_customer)->get();
        //Proses pembatalan dalam 1 hari
        $now = Carbon::now();
        $progres = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Kontrak Disetujui')->get();


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

        $btl = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Pending')->get();


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
        return view('/customer/riwayatSewa', compact('kontraks', 'now', 'progres'));
    }

    public function tampilRiwayatProgress()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'In Progress')->orderBy('tgl_mulai_kontrak', 'asc')->get();

        return view('/customer/riwayatSewa', compact('kontraks'));
    }

    public function tampilRiwayatFinish()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Finish')->orWhere('status_kontrak', 'Cancel')->where('id_customer', Auth::guard('customer')->user()->id_customer)->get();

        return view('/customer/riwayatSewa', compact('kontraks'));
    }

    public function tampilDetailRiwayat($id_kontrak)
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $kontraks     = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->first();
        $pembayaranP = PembayaranPerlengkapanModel::where('id_kontrak', $id_kontrak)->first();
        $pembayaranTK = PembayaranTenagaKerjaModel::where('id_kontrak', $id_kontrak)->get();

        return view('/customer/riwayatSewaDetail', compact('kontraks', 'datas', 'id_customer', 'pembayaranP', 'pembayaranTK'));
    }

    public function formKomplain($id_kontrak)
    {

        $kontraks       = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->where('id_customer', Auth::guard('customer')->user()->id_customer)->first();
        $tenaga_kerja   = tenaga_kerjaModel::where('id_kontrak', $id_kontrak)->get();

        return view('/customer/formKomplain', compact('kontraks', 'tenaga_kerja'));
    }

    public function tambahFormKomplain(Request $request, $id_kontrak)
    {
        $this->validate($request, [
            'alasan' => 'required'
        ], [
            'alasan.required' => '*Harus isi terlebih dahulu'
        ]);

        $kontrak     = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->first();

        $komplain    = new komplainModel();
        $komplain->id_kontrak = $kontrak->id_kontrak;
        $komplain->id_customer = Auth::guard('customer')->user()->id_customer;
        $komplain->alasan       = $request->alasan;
        $komplain->save();


        $detail_komplain    = new detail_komplainModel();
        $detail_komplain->id_komplain = $komplain->id_komplain;
        $detail_komplain->id_tenagaKerja = $request->id_tenagaKerja;
        $detail_komplain->save();

        return redirect('/customer/riwayatKomplain')->with('alert-success', 'Berhasil Ajukan Komplain');
    }


    public function riwayatKomplain()
    {
        $komplain    = komplainModel::where('id_customer', Auth::guard('customer')->user()->id_customer)->get();
        $kontrak     = kontrak_jasaModel::all();
        $outsourcing = OutsourcingModel::all();

        return view('/customer/riwayatKomplain', compact('komplain', 'kontrak', 'outsourcing'));
    }

    public function tampilDetailKomplain($id_komplain)
    {
        $komplain     = komplainModel::where('id_komplain', $id_komplain)->where('id_customer', Auth::guard('customer')->user()->id_customer)->get();
        $detail_komplain = detail_komplainModel::where('id_komplain', $id_komplain)->first();

        return view('/customer/komplainDetail', compact('komplain', 'detail_komplain'));
    }

    public function tampilPenyediaJasa()
    {
        $outsourcing = OutsourcingModel::all();
        $jenisjasa = JenisJasaModel::all();
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

        return view('/customer/dataOutsourcing', compact('jenisjasa', 'outsourcing', 'datas', 'id_customer'));
    }

    public function cariOsr(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cariOsr;

        // mengambil data dari table pegawai sesuai pencarian data
        $outsourcing = OutsourcingModel::where('nama_outsourcing', 'like', "%" . $cari . "%")->paginate();

        // mengirim data pegawai ke view index
        return view('/customer/dataOutsourcing', compact('outsourcing'));
    }

    public function tampilDetailOutsourcing($id_outsourcing)
    {
        $outsourcing     = OutsourcingModel::where('id_outsourcing', $id_outsourcing)->first();
        $jasa   = jasaModel::where('id_outsourcing', $id_outsourcing)->get();

        return view('/customer/detailOutsourcing', compact('outsourcing', 'jasa'));
    }

    public function ubahProfil()
    {
        $id_customer = Auth::guard('customer')->user()->id_customer;
        $datas = CustomerModel::find($id_customer);

        return view('/customer/ubahProfil', compact('datas', 'id_customer'));
    }

    public function formUbah()
    {
        $id_customer = (Auth::guard('customer')->user()->id_customer);
        $datas = CustomerModel::find($id_customer);

        return view('/customer/formUbah', compact('datas', 'id_customer'));
    }

    public function pembayaranTenagaKerja($id_kontrak)
    {
        $id_customer = (Auth::guard('customer')->user()->id_customer);
        $kontrak = kontrak_jasaModel::find($id_kontrak);
        $countPembayaranTK = PembayaranTenagaKerjaModel::where('id_kontrak', $id_kontrak);
        $now = Carbon::now()->format('y-m-d');
        $lamaKontrak = $kontrak->lama_kontrak;

        $selisih_hari = $kontrak->tgl_mulai_kontrak->diffInDays($now);
        $jumlahHariKerja = $countPembayaranTK * 30;

        if ($countPembayaranTK <= $lamaKontrak) {

            if ($jumlahHariKerja <= $selisih_hari) {

                $idKontrak = $kontrak->id_kontrak;
                $pembayaranTK = new PembayaranTenagaKerjaModel;
                $pembayaranTK->id_outsourcing = $kontrak->id_outsourcing;
                $pembayaranTK->id_kontrak = $idKontrak;
                $pembayaranTK->nama_pembayaran = "Pembayaran Kontrak bulan ke" . $countPembayaranTK++;
                $pembayaranTK->bulan_ke = $countPembayaranTK++;
                $pembayaranTK->status_bayar = "Menunggu Pembayaran";
                $pembayaranTK->save();
            } else {
            }
        } else {
        }


        return view('/customer/riwayatSewaDetail', compact('datas', 'id_customer'));
    }


    public function uploadPembayaranPerlengkapan(Request $request)
    {
        $idKontrak = $request->id_kontrak;
        $now = Carbon::now()->format('y-m-d');


        $pembayaranTK = PembayaranPerlengkapanModel::where('id_kontrak', $idKontrak)->where('status_bayar', 'Menunggu Pembayaran')->first();

        $file = $request->file('bukti_tfPerlengkapan'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move('pengguna/assets/images/bukti_tf', $nama_file); // isi dengan nama folder tempat kemana file diupload

        $pembayaranTK->bukti_tf = $nama_file;
        $pembayaranTK->waktu_bayar = $now;
        $pembayaranTK->status_bayar = 'Menunggu Validasi';
        $pembayaranTK->update();

        return redirect('/customer/riwayatSewaDetail' . $idKontrak)->with('alert-success', 'Bukti Pembayaran Perlengkapan Berhasil di Upload');
    }

    public function uploadPembayaranTenaga(Request $request)
    {
        $idKontrak = $request->id_kontrak;
        $now = Carbon::now()->format('y-m-d');


        $pembayaranTK = PembayaranTenagaKerjaModel::where('status_bayar', 'Menunggu Pembayaran')->first();

        $file = $request->file('bukti_tfTenagaKerja'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move('pengguna/assets/images/bukti_tf', $nama_file); // isi dengan nama folder tempat kemana file diupload
        $pembayaranTK->bukti_tf = $nama_file;
        $pembayaranTK->waktu_bayar = $now;
        $pembayaranTK->status_bayar = 'Menunggu Validasi';
        $pembayaranTK->update();

        return redirect('/customer/riwayatSewaDetail' . $idKontrak)->with('alert-success', 'Bukti Pembayaran Tenaga Kerja Berhasil di Upload');
    }
}
