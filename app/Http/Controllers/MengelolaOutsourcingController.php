
<?php

namespace App\Http\Controllers;

use App\OutsourcingModel;
use Illuminate\Http\Request;
use Session;
use DB;

class MengelolaOutsourcingController extends Controller
{
    public function index()     {  

        if(!Session::get('loginAdmin')){
            return redirect('/admin/MengelolaAdmin')->with('alert','Anda harus login dulu');
        }
        else{
        $nungguValidasi= DB::select('SELECT * FROM outsourcing WHERE nama_outsourcing OR alamat OR no_telp OR nama_pemilikRekening OR nama_bank OR no_rekening OR email OR scan_siup OR scan_tdp OR scan_ktp OR no_siup OR no_tdp OR foto_profil IS NOT NULL' );
        $datas = OutsourcingModel::all();    
        	return view('admin.halaman.MengelolaOutsourcing',compact('datas','nungguValidasi'));     
        }  
    }

    public function delete($id_outsourcing) {
    	$datas = OutsourcingModel::find($id_outsourcing);
    	$datas->delete();
    	return redirect('/admin/MengelolaOutsourcing')->with('alert-success','Data berhasil dihapus!');
    }

    public function detailOutsourcing($id_outsourcing) {
    	$datas = OutsourcingModel::find($id_outsourcing);
    	return view('admin.halaman.DetailOutsourcing',compact('datas'));
    }

    public function validasiOutsourcing($id_outsourcing) {
    	$datas=OutsourcingModel::find($id_outsourcing);
        $datas->status_outsourcing = 'Tervalidasi';
        $datas->save();

        return redirect('/admin/DetailOutsourcing'.$id_outsourcing)->with('alert-success','Outsourcing berhasil divalidasi!');

    }


}

