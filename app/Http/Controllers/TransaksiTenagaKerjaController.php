<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranTenagaKerjaModel;

class TransaksiTenagaKerjaController extends Controller
{
    public function index(){

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        $datas = PembayaranTenagaKerjaModel::get();
        return view('outsourcing/TransaksiTenagaKerja',compact('datas'));
    }

    public function delete($id_pembayaranTenagaKerja) {
    	$datas = PembayaranTenagaKerjaModel::find($id_pembayaranTenagaKerja);
    	$datas->delete();
    	return redirect('/outsourcing/TransaksiTenagaKerja')->with('alert-success','Data berhasil dihapus!');
    }
}
