<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JenisJasaModel extends Model
{
    protected $table = 'jenis_jasa';
    protected $primaryKey = 'id_jenisJasa';
    protected $fillable = ['nama_jenisJasa', 'picturePath'];

    public function jasa()
    {
        return $this->belongsToMany(jasaModel::class, 'jasa', 'id_jenisJasa','deskripsi'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute()
    {
        return config('app.url') . Storage::url($this->attributes['picturePath']);
    }
}
