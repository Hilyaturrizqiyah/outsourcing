<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisJasaModel extends Model
{
    protected $table = 'jenis_jasa';
    protected $primaryKey = 'id_jenisJasa';
    protected $fillable = ['nama_jenisJasa'];

    public function jasa() {
        return $this->belongsToMany(jasaModel::class,'jasa','id_jenisJasa');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

}
