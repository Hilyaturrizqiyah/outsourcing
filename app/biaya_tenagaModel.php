<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biaya_tenagaModel extends Model
{
    protected $table = 'biaya_tenaga';
    protected $primaryKey = 'id_biayaTenaga';
    protected $fillable = ['id_jasa', 'nama_biayaTenaga', 'biaya'];

}
