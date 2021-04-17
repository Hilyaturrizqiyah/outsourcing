<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_pribadiModel extends Model
{
    protected $table = 'data_pribadi';
    protected $primaryKey = 'id_data_pribadi';
    protected $fillable = ['id_tenaga_kerja', 'no_ktp', 'nama_lengkap', 'nama_panggilan', 'foto', 'ttl', 'alamat_rumah',
    'agama', 'kewarganegaraan', 'anak_ke', 'nama_ayah_kandung', 'nama_ibu_kandung', 'status_menikah', 'status_kepemilikan_rumah', 'transportasi', 'no_telp'];

}
