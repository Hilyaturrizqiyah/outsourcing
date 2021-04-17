<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikan_formalModel extends Model
{
    protected $table = 'pend_formal';
    protected $primaryKey = 'id_pendFormal';
    protected $fillable = ['id_tenagaKerja', 'pendidikan', 'nama_institusi', 'jurusan', 'lokasi'];

}
