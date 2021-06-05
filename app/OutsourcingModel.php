<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Authenticable;
use Illuminate\Support\Facades\Storage;

class OutsourcingModel extends Authenticable
{
    protected $table = 'outsourcing';
    protected $primaryKey = 'id_outsourcing';
    protected $fillable = ['nama_outsourcing', 'alamat', 'no_telp', 'nama_pemilikRekening', 'nama_bank', 'no_rekening', 'email', 'password', 'picturePath'];

    public function jasa()
    {
        return $this->belongsToMany(jasaModel::class, 'jasa', 'id_outsourcing'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
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
