<?php

namespace App\Http\Controllers;

use App\CustomerModel;
use Illuminate\Http\Request;
use Session;

class MengelolaCustomerController extends Controller
{
        public function index()     {  

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        $datas = CustomerModel::get();         
        	return view('admin.halaman.MengelolaCustomer',compact('datas'));     
        //}  
    }

    public function delete($id_customer) {
    	$datas = CustomerModel::find($id_customer);
    	$datas->delete();
    	return redirect('/admin/MengelolaCustomer')->with('alert-success','Data berhasil dihapus!');
    }


}
