<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_jasaModel extends Model
{
    protected $table = 'jenis_jasa';
    protected $primaryKey = 'id_jenisJasa';
    protected $fillable = ['nama_jenisJasa'];

}
