<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeluargaModel extends Model
{
    protected $table = 'data_keluarga';
    protected $primaryKey = 'id_data_keluarga';
    protected $fillable = ['id_tenagaKerja', 'nama_keluarga', 'status_keluarga', 'pekerjaan', 'ttl'];

}
