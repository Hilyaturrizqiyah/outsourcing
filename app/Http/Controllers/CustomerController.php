<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use App\jasaModel;
use App\JenisJasaModel;
use App\kontrak_jasaModel;
use App\OutsourcingModel;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function index(){
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $jenisjasa = JenisJasaModel::all();
        $jasa = jasaModel::all();

        return view('/customer/DashboardCustomer', compact('jenisjasa','datas','id_customer','jasa'));
    }

    public function tampilDetailJasa($id_jasa)
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $jasa     = jasaModel::where('id_jasa', $id_jasa)->first();

        return view('/customer/detailJasa', compact('jasa','datas','id_customer'));
    }

    public function formKontrak($id_jasa)
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $jasa     = jasaModel::where('id_jasa', $id_jasa)->first();
        $outsourcing    = OutsourcingModel::all();
        // $customer   = CustomerModel::where();

        return view('/customer/formKontrak', compact('jasa','datas','id_customer','outsourcing'));
    }

    public function tambahFormKontrak(Request $request, $id_jasa)
    {
        $this->validate($request, [
            'tgl_mulai_kontrak' => 'required',
            'lama_kontrak' => 'required',
            'jumlah_tenagaKerja' => 'required'
        ],[
            'tgl_mulai_kontrak.required' => '*Harus isi terlebih dahulu',
            'lama_kontrak.required' => '*Harus isi terlebih dahulu',
            'jumlah_tenagaKerja.required' => '*Harus isi terlebih dahulu',
        ]);
        $jasa     = jasaModel::where('id_jasa', $id_jasa)->first();
        $outsourcing    = OutsourcingModel::where('id_jasa', $id_jasa)->get();
        //validasi data
        if($request->jumlah_tenagaKerja > $jasa->jumlah_tenagaKerjak){
            return redirect('customer/formKontrak'.$id_jasa)->with('alert', 'Gagal Pengajuan');
        }
        $cek_pengajuan = kontrak_jasaModel::where('id_customer', Session::get('id_pasien'))->where('status', 'Pending')->first();
        if(empty($cek_pengajuan)){
        $kontrak    = new kontrak_jasaModel;
        $kontrak->id_jasa = $jasa->id_jasa;
        $kontrak->id_customer = Session::get('id_customer');
        $kontrak->id_outsourcing = $outsourcing->id_outsourcing;
        $kontrak->tgl_mulai_kontrak = $request->tgl_mulai_kontrak;
        $kontrak->lama_kontrak = $request->lamaKontrak + $request->deskripsi;
        $kontrak->jumlah_tenaga_kerja = $request->jumlah_tenaga_kerja;
        $kontrak->status = "Pending";
        $kontrak->save();
        }

        $datas = CustomerModel::find($id_customer);
        // $customer   = CustomerModel::where();

        return redirect('/customer/riwayatSewa');
    }

    public function tampilPenyediaJasa(){
        $outsourcing = OutsourcingModel::all();
        $jenisjasa = JenisJasaModel::all();
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

        return view('/customer/dataOutsourcing', compact('jenisjasa','outsourcing','datas','id_customer'));
    }

    public function tampilDetailOutsourcing($id_outsourcing)
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);
        $outsourcing     = OutsourcingModel::where('id_outsourcing', $id_outsourcing)->first();

        return view('/customer/detailOutsourcing', compact('outsourcing','datas','id_customer'));
    }

    public function ubahProfil()
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

    	return view('/customer/ubahProfil',compact('datas','id_customer'));

    }

    public function formUbah()
    {
        $id_customer = Session::get('id_customer');
        $datas = CustomerModel::find($id_customer);

    	return view('/customer/formUbah',compact('datas','id_customer'));

    }
}
