<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsiModel extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];
}
