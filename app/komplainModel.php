<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komplainModel extends Model
{
    protected $table = 'komplain';
    protected $primaryKey = 'id_komplain';
    protected $fillable = ['id_customer', 'id_kontrak', 'alasan'];

    public function kontrak()
    {
        return $this->belongsTo(kontrak_jasaModel::class, 'id_kontrak');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'id_customer');
    }

    public function detail_komplain()
    {
        return $this->belongsToMany(detail_komplainModel::class, 'detail_komplain', 'id_komplain'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
