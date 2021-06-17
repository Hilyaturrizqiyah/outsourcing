<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tenaga_kerjaModel;
use App\AreaModel;
use App\jasaModel;
use App\OutsourcingModel;
use App\kontrak_jasaModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MengelolaTenagaKerjaController extends Controller
{
    public function index(){

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        $datas = tenaga_kerjaModel::All();

        return view('outsourcing/MengelolaTenagaKerja',compact('datas'));
    }

    public function delete($id_tenagaKerja) {
    	$datas = tenaga_kerjaModel::find($id_tenagaKerja);
    	$datas->delete();
    	return redirect('/outsourcing/MengelolaTenagaKerja')->with('alert-success','Data berhasil dihapus!');
    }
}
