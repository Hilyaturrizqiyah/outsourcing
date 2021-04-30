<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jasaModel extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'id_jasa';
    protected $fillable = ['id_jenisJasa', 'nama_jasa'];

    public function jenis_jasa() {
        return $this->belongsTo(jenis_jasaModel::class,'id_jenisJasa');
    }

    public function biaya_perlengkapan() {
        return $this->belongsToMany(Biaya_perlengkapanModel::class,'biaya_perlengkapan','id_jasa');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function biaya_tenaga() {
        return $this->belongsToMany(biaya_tenagaModel::class,'biaya_tenaga','id_jasa');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

}