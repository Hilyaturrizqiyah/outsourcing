<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tenaga_kerjaModel extends Model
{
    protected $table = 'tenaga_kerja';
    protected $primaryKey = 'id_tenagaKerja';
    protected $fillable = ['id_area', 'id_jasa', 'nama_tenagaKerja', 'no_ktp', 'email', 'password', 'status_tenagaKerja'];

    public function DataPribadi() { // 1 praktik memiliki 1 datpribadi
        return $this->hasOne(data_pribadiModel::class, 'id_tenagaKerja');
    }

    public function DataKeluarga() { // 1 praktik memiliki banyak keluarga
        return $this->hasMany(data_keluargaModel::class,'id_tenagaKerja');
    }

    public function Jasa() {
        return $this->belongsTo(jasaModel::class,'id_jasa');
    }

    public function Kontrak() {
        return $this->belongsTo(kontrak_jasaModel::class,'id_kontrak');
    }

}
