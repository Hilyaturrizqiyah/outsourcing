<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lamaran_kerjaModel extends Model
{
    protected $table = 'lamaran_kerja';
    protected $primaryKey = 'id_lamaran';
    protected $fillable = ['id_jasa', 'waktu_diterima', 'status_lamaran'];

}
