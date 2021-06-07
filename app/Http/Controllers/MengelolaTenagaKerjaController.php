<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tenaga_kerjaModel;
use App\AreaModel;
use App\jasaModel;

class MengelolaTenagaKerjaController extends Controller
{
    public function index(){

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        $datas = tenaga_kerjaModel::get();
        return view('outsourcing/MengelolaTenagaKerja',compact('datas'));
    }
}
