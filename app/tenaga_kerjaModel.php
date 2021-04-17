<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tenaga_kerjaModel extends Model
{
    protected $table = 'tenaga_kerja';
    protected $primaryKey = 'id_tenagaKerja';
    protected $fillable = ['id_area', 'id_jasa', 'nama_tenagaKerja', 'no_ktp', 'email', 'password', 'status_tenagaKerja'];

}
