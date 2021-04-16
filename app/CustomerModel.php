<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $fillable = ['id_area', 'nama_customer', 'alamat', 'no_telp', 'email', 'password'];
}
