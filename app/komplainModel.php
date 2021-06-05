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
}
