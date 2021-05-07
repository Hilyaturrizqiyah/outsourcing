<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota_kabupatenModel extends Model
{
    protected $table = 'kota_kabupaten';
    protected $primaryKey = 'id';
    protected $fillable = ['id_provinsi', 'nama_kotaKabupaten'];
}
