<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\jasaModel;
use App\JenisJasaModel;
use App\komplainModel;
use App\kontrak_jasaModel;
use App\OutsourcingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Session;

class CustomerController extends Controller
{
    public function index()
    {
        // $id_customer = Session::get('id_customer');
        // $datas = CustomerModel::find($id_customer);
        $jenisjasa = JenisJasaModel::all();
        $jasa = jasaModel::all();

        return view('/customer/DashboardCustomer', compact('jenisjasa', 'jasa'));
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
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $jasa     = jasaModel::where('id_jasa', $id_jasa)->first();
        $outsourcing    = OutsourcingModel::all();
        // $customer   = CustomerModel::where();

        return view('/customer/formKontrak', compact('jasa', 'datas', 'id_customer', 'outsourcing'));
    }

    public function tambahFormKontrak(Request $request, $id_jasa)
    {
        // $this->validate($request, [
        //     'tgl_mulai_kontrak' => 'required',
        //     'lama_kontrak' => 'required',
        //     'jumlah_tenagaKerja' => 'required'
        // ], [
        //     'tgl_mulai_kontrak.required' => '*Harus isi terlebih dahulu',
        //     'lama_kontrak.required' => '*Harus isi terlebih dahulu',
        //     'jumlah_tenagaKerja.required' => '*Harus isi terlebih dahulu',
        // ]);

        $jasa     = jasaModel::where('id_jasa', $id_jasa)->first();

        $kontrak    = new kontrak_jasaModel;
        $kontrak->id_jasa = $jasa->id_jasa;
        $kontrak->id_customer = Auth::guard('customer')->user()->id_customer;
        $kontrak->id_outsourcing = $jasa->outsourcing->id_outsourcing;
        $kontrak->tgl_mulai_kontrak = $request->tgl_mulai_kontrak;
        $kontrak->lama_kontrak = $request->lamaKontrak . " " . $request->deskripsi;
        $kontrak->jumlah_tenagaKerja = $request->jumlah_tenagaKerja;
        $kontrak->status_kontrak = "Pending";
        $kontrak->save();

        return redirect('/customer/riwayatSewa')->with('alert-success', 'Data Berhasil Ditambah');
    }

    public function tampilRiwayatPengajuan()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Pending')->orWhere('status_kontrak', 'Kontrak Disetujui')->get();

        return view('/customer/riwayatSewa', compact('kontraks'));
    }

    public function tampilRiwayatProgress()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'In Progress')->get();

        return view('/customer/riwayatSewa', compact('kontraks'));
    }

    public function tampilRiwayatFinish()
    {
        $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Auth::guard('customer')->user()->id_customer)->where('status_kontrak', 'Finish')->orWhere('status_kontrak', 'Cancel')->get();

        return view('/customer/riwayatSewa', compact('kontraks'));
    }

    public function tampilDetailRiwayat($id_kontrak)
    {
        // $kontraks    = kontrak_jasaModel::with('jasa')->where('id_customer', Session::get('id_customer'))->where('status_kontrak','In Progress')->get();
        // // $outsourcing = OutsourcingModel::all();
        // // $jasa   = jasaModel::all();
        // // $jenisjasa = JenisJasaModel::all();
        // // $id_customer = Session::get('id_customer');
        // $datas = CustomerModel::where('id_customer', Session::get('id_customer'))->first();
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $kontraks     = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->first();

        return view('/customer/riwayatSewaDetail', compact('kontraks', 'datas', 'id_customer'));
    }

    public function formKomplain($id_kontrak)
    {

        $kontraks     = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->first();

        return view('/customer/formKomplain', compact('kontraks'));
    }

    public function tambahFormKomplain(Request $request, $id_kontrak)
    {
        // $this->validate($request, [
        //     'tgl_mulai_kontrak' => 'required',
        //     'lama_kontrak' => 'required',
        //     'jumlah_tenagaKerja' => 'required'
        // ], [
        //     'tgl_mulai_kontrak.required' => '*Harus isi terlebih dahulu',
        //     'lama_kontrak.required' => '*Harus isi terlebih dahulu',
        //     'jumlah_tenagaKerja.required' => '*Harus isi terlebih dahulu',
        // ]);

        $kontrak     = kontrak_jasaModel::where('id_kontrak', $id_kontrak)->first();

        $komplain    = new komplainModel();
        $komplain->id_kontrak = $kontrak->id_kontrak;
        $komplain->id_customer = Auth::guard('customer')->user()->id_customer;
        $komplain->alasan       = $request->alasan;
        $komplain->save();

        return redirect('/customer/riwayatKomplain')->with('alert-success', 'Berhasil Ajukan Komplain');
    }


    public function riwayatKomplain()
    {
        $komplain    = komplainModel::where('id_customer', Auth::guard('customer')->user()->id_customer)->get();
        $kontrak     = kontrak_jasaModel::all();

        return view('/customer/riwayatKomplain', compact('komplain', 'kontrak'));
    }

    public function tampilPenyediaJasa()
    {
        $outsourcing = OutsourcingModel::all();
        $jenisjasa = JenisJasaModel::all();
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

        return view('/customer/dataOutsourcing', compact('jenisjasa', 'outsourcing', 'datas', 'id_customer'));
    }

    public function tampilDetailOutsourcing($id_outsourcing)
    {
        // $id_customer = Session::get('id_customer');
        // $datas = CustomerModel::find($id_customer);
        $outsourcing     = OutsourcingModel::where('id_outsourcing', $id_outsourcing)->first();
        $jasa   = jasaModel::where('id_outsourcing', $id_outsourcing)->get();

        return view('/customer/detailOutsourcing', compact('outsourcing', 'jasa'));
    }

    public function formKontrakOutsourcing($id_outsourcing)
    {
        $outsourcing     = OutsourcingModel::where('id_outsourcing', $id_outsourcing)->first();
        $jasa   = jasaModel::where('id_outsourcing', $id_outsourcing)->get();

        return view('/customer/kontrakOsr', compact('outsourcing','jasa'));
    }

    public function tambahFormKontrakOsr(Request $request, $id_outsourcing)
    {
        // $this->validate($request, [
        //     'tgl_mulai_kontrak' => 'required',
        //     'lama_kontrak' => 'required',
        //     'jumlah_tenagaKerja' => 'required'
        // ], [
        //     'tgl_mulai_kontrak.required' => '*Harus isi terlebih dahulu',
        //     'lama_kontrak.required' => '*Harus isi terlebih dahulu',
        //     'jumlah_tenagaKerja.required' => '*Harus isi terlebih dahulu',
        // ]);

        $outsourcing     = OutsourcingModel::where('outsourcing', $id_outsourcing)->first();

        $kontrak    = new kontrak_jasaModel;
        $kontrak->id_outsourcing = $outsourcing->id_outsourcing;
        $kontrak->id_customer = Auth::guard('customer')->user()->id_customer;
        $kontrak->id_jasa = $request->id_jasa;
        $kontrak->tgl_mulai_kontrak = $request->tgl_mulai_kontrak;
        $kontrak->lama_kontrak = $request->lamaKontrak . " " . $request->deskripsi;
        $kontrak->jumlah_tenagaKerja = $request->jumlah_tenagaKerja;
        $kontrak->status_kontrak = "Pending";
        $kontrak->save();

        return redirect('/customer/riwayatSewa')->with('alert-success', 'Data Berhasil Ditambah');
    }


    public function ubahProfil()
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

        return view('/customer/ubahProfil', compact('datas', 'id_customer'));
    }

    public function formUbah()
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

        return view('/customer/formUbah', compact('datas', 'id_customer'));
    }
}
