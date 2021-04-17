<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengalaman_kerjaModel extends Model
{
    protected $table = 'pengalaman_kerja';
    protected $primaryKey = 'id_pengalaman';
    protected $fillable = ['id_tenagaKerja', 'nama_perusahaan', 'periode', 'posisi', 'gaji', 'alasan_berhenti'];

}
