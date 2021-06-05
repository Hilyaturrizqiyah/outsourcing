<?php

namespace App\Http\Controllers;

use App\provinsiModel;
use App\tenaga_kerjaModel;
use App\data_pribadiModel;
use App\DataKeluargaModel;
use App\pendidikan_formalModel;
use App\pendidikan_nonFormalModel;
use App\keterampilanModel;
use App\pengalaman_kerjaModel;
use App\jasaModel;
use App\JenisJasaModel;
use App\lamaran_kerjaModel;

use Illuminate\Http\Request;
use Session;
use Hash;
use DB;

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
                      
        	return view('tenagakerja.halaman.ProfilTenagaKerja',compact('datas','id_tenagaKerja','countDataPribadi','dataPribadi'));
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

    	return redirect('/tenagakerja/RegisterTenagaKerja')->with('alert-success','Data Akun berhasil ditambahkan!');
    }

    public function edit() {

        if(!Session::get('loginTenagaKerja')){
            return redirect('tenagakerja/LoginTenagakerja')->with('alert','Anda harus login dulu');
        }
        else{
            // Fetch departments
            $provinsi['data'] = provinsiModel::all();

            $id_tenagaKerja = Session::get('id_tenagaKerja');
            $datas = tenaga_kerjaModel::find($id_tenagaKerja);
            
            $countDataPribadi = data_pribadiModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $dataPribadi = data_pribadiModel::where('id_tenagaKerja',$id_tenagaKerja)->first();
            
            $countDataKeluarga = DataKeluargaModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $dataKeluarga = DataKeluargaModel::where('id_tenagaKerja',$id_tenagaKerja)->get();

            $countPddkFormal = pendidikan_formalModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $pddkFormal = pendidikan_formalModel::where('id_tenagaKerja',$id_tenagaKerja)->get();
            
            $countPddkNonFormal = pendidikan_nonFormalModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $pddkNonFormal = pendidikan_nonFormalModel::where('id_tenagaKerja',$id_tenagaKerja)->get();
            
            $countKeterampilan = keterampilanModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $keterampilan = keterampilanModel::where('id_tenagaKerja',$id_tenagaKerja)->get();
            
            $countPengalamanKerja = pengalaman_kerjaModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $pengalamanKerja = pengalaman_kerjaModel::where('id_tenagaKerja',$id_tenagaKerja)->get();
            
        	return view('tenagakerja.halaman.UbahProfilTenagaKerja',compact('provinsi','datas','id_tenagaKerja','countDataPribadi','dataPribadi','countDataKeluarga','dataKeluarga','countPddkFormal','pddkFormal','countPddkNonFormal','pddkNonFormal','countKeterampilan','keterampilan','countPengalamanKerja','pengalamanKerja'))->with("provinsi",$provinsi);
        }
        
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
            'foto_profil.max' => 'tidak boleh lebih 2 Mb'
        ];

    	$this->validate($request, [
    		'nama_tenagaKerja' => 'nullable|max:50',
    		'no_ktp' => 'nullable|numeric|digits_between:0,50',
            'email' => 'nullable|email|max:50',
    		'password' => 'nullable|max:255',
            'foto_profil' => 'nullable|image|max:2048'
    	], $messages);

        

        $datas = tenaga_kerjaModel::find($id_tenagaKerja);
        $datas->nama_tenagaKerja = $request->nama_tenagaKerja;
        $datas->no_ktp = $request->no_ktp;
        $datas->email = $request->email;        

        if (empty($request->password)){
            $datas->password = $datas->password;
        }
        else{
            $datas->password = bcrypt($request->password);
        }

        if (empty($request->foto_profil)){
            $datas->foto_profil = $datas->foto_profil;
        }
        else{
            $file = $request->file('foto_profil'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('pengguna/assets/images/foto_profil',$nama_file); // isi dengan nama folder tempat kemana file diupload
            
            $datas->foto_profil = $nama_file;

        }

        $datas->save();
        $datas->foto_profil;

        $countDataPribadi = data_pribadiModel::where('id_tenagaKerja',$id_tenagaKerja)->count();

        if ($countDataPribadi == !null) {
            $pribadi = data_pribadiModel::find($id_tenagaKerja);
            $pribadi->no_ktp = $request->no_ktp;
            $pribadi->foto = $datas->foto_profil;
            $pribadi->save();
        } else {
            
        }
        

        return redirect('/tenagakerja/UbahProfilTenagaKerja')->with('alert-success','Data Akun berhasil diubah!');
    }

    public function jasa() {

        if(!Session::get('loginTenagaKerja')){
            return redirect('tenagakerja/LoginTenagakerja')->with('alert','Anda harus login dulu');
        }
        else{
            $id_tenagaKerja = Session::get('id_tenagaKerja');
            $datas = tenaga_kerjaModel::find($id_tenagaKerja);
            $jasas = jasaModel::all();
            $jenis_jasas = JenisJasaModel::all();
            
        	return view('tenagakerja.halaman.JasaTenagaKerja',compact('datas','jasas','id_tenagaKerja','jenis_jasas'));
        }
    }

    public function melamarKerja($id_jasa) {

        if(!Session::get('loginTenagaKerja')){
            return redirect('tenagakerja/LoginTenagakerja')->with('alert','Anda harus login dulu');
        }
        else{
            $id_tenagaKerja = Session::get('id_tenagaKerja');
            $tenagaKerja = tenaga_kerjaModel::find($id_tenagaKerja);
            $countDataPribadi = data_pribadiModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $countDataKeluarga = DataKeluargaModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $countPddkFormal = pendidikan_formalModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $countPddkNonFormal = pendidikan_nonFormalModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $countKeterampilan = keterampilanModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $countPengalaman = pengalaman_kerjaModel::where('id_tenagaKerja',$id_tenagaKerja)->count();
            $countLamarNunggu = DB::table('lamaran_kerja')->where('id_tenagaKerja', '=', $id_tenagaKerja)->where('status_lamaran', '=', 'Menunggu Validasi')->count();
            
            if ($tenagaKerja->status_tenagaKerja == 'Pelamar' && $countLamarNunggu == 0) {
                if ($tenagaKerja->foto_profil != "" || $countDataPribadi !=0 || $countPddkFormal!=0 || $countPddkNonFormal!=0 || $countKeterampilan!=0 || $countPengalaman!=0 ) {
                    $data = new lamaran_kerjaModel();
                    $data->id_tenagaKerja = $id_tenagaKerja;
                    $data->id_jasa = $id_jasa;
                    $data->status_lamaran = "Menunggu Validasi";
                    $data->save();
    
                    return redirect('tenagakerja/JasaTenagaKerja')->with('alert-success','Lamaran Pekerjaan berhasil di kirim kepada Outsourcing, silahkan tunggu sampai Outsurcing memvalidasi');
    
                }else{
                    return redirect('tenagakerja/JasaTenagaKerja')->with('alert','Lengkapi dahulu data profil tenaga kerja');
    
                }
                
            }else{
                return redirect('tenagakerja/JasaTenagaKerja')->with('alert','Maaf Anda sudah bukan sebagai Pelamar, atau anda sedang menunggu Hasil lamaran');

            }

            
        }
    }

}
