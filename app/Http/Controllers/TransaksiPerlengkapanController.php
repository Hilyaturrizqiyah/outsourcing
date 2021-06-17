<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biaya_perlengkapanModel;
use App\PembayaranPerlengkapanModel;

class TransaksiPerlengkapanController extends Controller
{
    public function index(){

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        $datas = PembayaranPerlengkapanModel::get();
        return view('outsourcing/TransaksiPerlengkapan',compact('datas'));
    }

    public function delete($id_pembayaranPerlengkapan) {
    	$datas = PembayaranPerlengkapanModel::find($id_pembayaranPerlengkapan);
    	$datas->delete();
    	return redirect('/outsourcing/TransaksiPerlengkapan')->with('alert-success','Data berhasil dihapus!');
    }
}
