<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota_kabupatenModel extends Model
{
    protected $table = 'kota_kabupaten';
    protected $primaryKey = 'id';
    protected $fillable = ['id_provinsi', 'nama_kotaKabupaten'];

    public function Provinsi() {
        return $this->belongsTo(provinsiModel::class,'id_provinsi');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
