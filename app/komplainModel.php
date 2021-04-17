<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komplainModel extends Model
{
    protected $table = 'komplain';
    protected $primaryKey = 'id_komplain';
    protected $fillable = ['id_customer', 'id_kontrak', 'alasan'];

}
