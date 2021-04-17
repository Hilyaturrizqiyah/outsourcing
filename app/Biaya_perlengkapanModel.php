<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biaya_perlengkapanModel extends Model
{
    protected $table = 'biaya_perlengkapan';
    protected $primaryKey = 'id_biayaPerlengkapan';
    protected $fillable = ['id_jasa', 'nama_biayaPerlengkapan', 'biaya'];

}
