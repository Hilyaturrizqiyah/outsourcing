<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikan_nonFormalModel extends Model
{
    protected $table = 'pend_non_formal';
    protected $primaryKey = 'id_pendNonFormal';
    protected $fillable = ['id_tenagaKerja', 'kursus', 'nama_institusi', 'periode', 'lokasi'];

}
