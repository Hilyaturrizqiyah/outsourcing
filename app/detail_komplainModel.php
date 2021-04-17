<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_komplainModel extends Model
{
    protected $table = 'detail_komplain';
    protected $primaryKey = 'id_detailKomplain';
    protected $fillable = ['id_komplain', 'id_tenagaKerja', 'alasan'];

}
