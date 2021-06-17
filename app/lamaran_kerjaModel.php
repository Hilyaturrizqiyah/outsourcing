<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lamaran_kerjaModel extends Model
{
    protected $table = 'lamaran_kerja';
    protected $primaryKey = 'id_lamaran';
    protected $fillable = ['id_jasa', 'waktu_diterima', 'status_lamaran'];

    public function Jasa()
    {
        return $this->belongsTo(jasaModel::class, 'id_jasa');
    }

    public function TenagaKerja()
    {
        return $this->belongsTo(tenaga_kerjaModel::class, 'id_tenagaKerja');
    }

}
