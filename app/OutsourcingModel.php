<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutsourcingModel extends Model
{
    protected $table = 'outsourcing';
    protected $primaryKey = 'id_area';
    protected $fillable = ['id_admin', 'nama_outsourcing', 'alamat', 'no_telp', 'nama_pemilikRekening', 'nama_bank', 'no_rekening', 'email', 'password'];

}
