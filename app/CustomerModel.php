<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Authenticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CustomerModel extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $fillable = ['id_area', 'nama_customer', 'alamat', 'no_telp', 'email', 'password'];

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'id_area');
    }
}
