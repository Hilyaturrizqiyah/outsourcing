<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keterampilanModel extends Model
{
    protected $table = 'keterampilan';
    protected $primaryKey = 'id_keterampilan';
    protected $fillable = ['id_tenagaKerja', 'nama_keterampilan', 'kemampuan'];

}
