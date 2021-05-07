<?php

namespace App\Http\Controllers;

use App\tenaga_kerjaModel;
use App\data_pribadiModel;
use App\data_keluargaModel;

use Illuminate\Http\Request;
use Session;
use Hash;

class TenagaKerjaController extends Controller
{
    public function login()     {  

        if(Session::get('loginTenagaKerja')){
            return redirect('/tenagakerja')->with('alert-success','Anda sudah login');
        }
        else{

            return view('landingpage.halaman.LoginTenagaKerja');
        }
    }

    public function postLogin(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = tenaga_kerjaModel::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_tenagaKerja',$data->id_tenagaKerja);
                Session::put('nama_tenagaKerja',$data->nama_tenagaKerja);
                Session::put('no_ktp',$data->no_ktp);
                Session::put('email',$data->email);
                Session::put('status_tenagaKerja',$data->status_tenagaKerja);
                
                Session::put('loginTenagaKerja',TRUE);
                return redirect('tenagakerja');
            }
            else{
                return redirect('tenagakerja/LoginTenagakerja')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('tenagakerja/LoginTenagakerja')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush('loginTenagaKerja');
        return redirect('tenagakerja/LoginTenagakerja')->with('alert-success','Anda sudah logout');
    }

    public function index() {

        if(!Session::get('loginTenagaKerja')){
            return redirect('tenagakerja/LoginTenagakerja')->with('alert','Anda harus login dulu');
        }
        else{
            $id_tenagaKerja = Session::get('id_tenagaKerja');
            $datas = tenaga_kerjaModel::find($id_tenagaKerja);
            
            $countDataPribadi = data_pribadiModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $dataPribadi = data_pribadiModel::where('id_tenagaKerja',$id_tenagaKerja)->get();
            
            $countDataKeluarga = data_keluargaModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $dataKeluarga = data_keluargaModel::where('id_tenagaKerja',$id_tenagaKerja)->get();
            
        	return view('tenagakerja.halaman.TenagaKerja',compact('datas','id_tenagaKerja','countDataPribadi','dataPribadi','countDataKeluarga','dataKeluarga'));
        }
    }

    public function tambah() {

        if(Session::get('loginTenagaKerja')){
            return redirect('/tenagakerja')->with('alert-success','Anda sudah login');
        }
        else{

            return view('landingpage.halaman.RegisterTenagaKerja');
        }
        
    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
        ];

    	$this->validate($request, [
    		'nama_tenagaKerja' => 'required|max:50',
    		'no_ktp' => 'required|numeric|digits_between:0,50',
            'email' => 'required|email|max:50',
    		'password' => 'required|max:255'
    	], $messages);

        $data = new tenaga_kerjaModel();
        $data->nama_tenagaKerja = $request->nama_tenagaKerja;
        $data->no_ktp = $request->no_ktp;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status_tenagaKerja = "Pelamar";
    	$data->save();

    	return redirect('/tenagakerja/LoginTenagaKerja')->with('alert-success','Data berhasil ditambahkan!');
    }

    public function update($id_tenagaKerja, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
        ];

    	$this->validate($request, [
    		'nama_tenagaKerja' => 'nullable|max:50',
    		'no_ktp' => 'nullable|numeric|digits_between:0,50',
            'email' => 'nullable|email|max:50',
    		'password' => 'nullable|max:255'
    	], $messages);

        $datas = tenaga_kerjaModel::find($id_tenagaKerja);
        $datas->nama_tenagaKerja = $request->nama_tenagaKerja;
        $datas->no_ktp = $request->no_ktp;
        $datas->email = $request->email;        
        $datas->password = bcrypt($request->password);
        $datas->save();

        return redirect('/tenagaKerja')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_admin) {
    	$datas = AdminModel::find($id_admin);
    	$datas->delete();
    	return redirect('/admin/MengelolaAdmin')->with('alert-success','Data berhasil dihapus!');
    }


}
