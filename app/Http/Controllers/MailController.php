<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function penerimaanTenagaKerja($id_tenagaKerja){
    
    $tenagaKerja = tenaga_kerjaModel::find($id_tenagaKerja);
    $jasa = jasaModel::find($tenagaKerja->id_jasa);
	$details = [
    'title' => 'Pemberitahuan Lamaran Tenaga Kerja ',
    'body' => 'Selamat anda diterima di Jasa '.$tenagaKerja->Jasa->nama_jasa.' pada Outsourcing '.$jasa->utsourcing->nama_outsourcing,
    ];
   
    \Mail::to($tenagaKerja->email)->send(new \App\Mail\MyTestMail($details));
   
    //return redirect('/tenagakerja')->with('alert-success','Tenaga Kerja berhasil diterima, Pemberitahuan dikirim melalui email');//ntar redirectnya diganti ke outsourcing

	}
}