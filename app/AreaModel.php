<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    protected $fillable = ['id_kotaKabupaten', 'nama_area'];

    
}
