<?php

namespace App\Http\Controllers;

use App\jasaModel;
use App\JenisJasaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MengelolaJasaController extends Controller
{
    public function index(){

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
        $jenis_jasa = JenisJasaModel::get();
        $datas = jasaModel::get();
        	return view('outsourcing.MengelolaJasa',compact('datas', 'jenis_jasa'));
    }

    // public function chained_dopdown(){

    //     $jenis_jasa = JenisJasaModel::all();


    //     return view('outsourcing.tambah.chained_dopdown')->with('jenis_jasa',$jenis_jasa);

    // }

    public function tambah() {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{
		//
        	//return view('outsourcing.tambah.TambahJasa');
        //}

        $jenis_jasa = JenisJasaModel::pluck('nama_jenisJasa', 'id_jenisJasa');

        return view('outsourcing.tambah.TambahJasa',['jenis_jasa' => $jenis_jasa,]);
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
            'harga.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'harga.min' => ':attribute tidak boleh kurang dari 0',
            'maks_tiket.min' => 'tiket tidak boleh kurang dari 0',
            'foto.max' => 'tidak boleh lebih 2 Mb'
        ];

    	$this->validate($request, [
            'nama_jasa' => 'required|max:50',
            'id_jenisJasa' => 'required',
            'foto_profil' => 'required|image|max:2048'
    	], $messages);

        $data = new jasaModel();
        $data->id_jasa = $request->id_jasa;
        $data->id_outsourcing = Auth::guard('outsourcing')->user()->id_outsourcing;
        $data->id_jenisJasa = $request->id_jenisJasa;
        $data->nama_jasa = $request->nama_jasa;

        $file = $request->file('foto_profil'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('assets/img/jasa',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->foto_profil = $nama_file;
    	$data->save();

    	return redirect('/outsourcing/MengelolaJasa')->with('alert-success','Data berhasil ditambahkan!');
    }

   	public function edit($id_jenis) {

        //if(!Session::get('login')){
        //    return redirect('LoginAdmin')->with('alert','Anda harus login dulu');
        //}
        //else{

        	$datas = jenisModel::find($id_jasa);
        	return view('admin.halaman.ubah_data.UbahJenisJasa',compact('datas'));
        //}
    }

    public function update($id_jenisJasa, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'harga.digits_between' => ':attribute diisi antara 0 sampai 15 digit',
            'harga.min' => ':attribute tidak boleh kurang dari 0',
            'maks_tiket.min' => 'tiket tidak boleh kurang dari 0',
            'foto.max' => 'tidak boleh lebih 2 Mb'
        ];

        $this->validate($request, [
            'nama_jasa' => 'required|max:50',
            'id_jenisJasa' => 'required',
            'foto_profil' => 'required|image|max:2048'
        ], $messages);

        $data = new jasaModel();
        $data->id_jasa = $request->id_jasa;
        $data->id_outsourcing = Auth::guard('outsourcing')->user()->id_outsourcing;
        $data->id_jenisJasa = $request->id_jenisJasa;
        $data->nama_jasa = $request->nama_jasa;

        $file = $request->file('foto_profil'); // menyimpan data gambar yang diupload ke variabel $file
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move('pengguna/assets/images/bukti_tf',$nama_file); // isi dengan nama folder tempat kemana file diupload
        $data->foto_profil = $nama_file;
    	$data->save();

    	return redirect('/outsourcing/MengelolaJasa')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_jasa) {
    	$datas = jasaModel::find($id_jasa);
    	$datas->delete();
    	return redirect('/outsourcing/MengelolaJasa')->with('alert-success','Data berhasil dihapus!');
    }
}
