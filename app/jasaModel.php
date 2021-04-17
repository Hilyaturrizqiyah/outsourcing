<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jasaModel extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'id_jasa';
    protected $fillable = ['id_jenisJasa', 'nama_jasa'];

}
