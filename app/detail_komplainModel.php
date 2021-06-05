<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_komplainModel extends Model
{
    protected $table = 'detail_komplain';
    protected $primaryKey = 'id_detailKomplain';
    protected $fillable = ['id_komplain', 'id_tenagaKerja'];

    public function komplain()
    {
        return $this->belongsTo(komplainModel::class, 'id_komplain');
    }

    public function tenagakerja()
    {
        return $this->belongsTo(tenaga_kerjaModel::class, 'id_tenagaKerja');
    }
}
