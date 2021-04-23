<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisJasaModel extends Model
{
    protected $table = 'jenis_jasa';
    protected $primaryKey = 'id_jenisJasa';
    protected $fillable = ['nama_jenisJasa'];

}
