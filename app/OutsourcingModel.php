<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OutsourcingModel extends Model
{
    protected $table = 'outsourcing';
    protected $primaryKey = 'id_outsourcing';
    protected $fillable = ['nama_outsourcing', 'alamat', 'no_telp', 'nama_pemilikRekening', 'nama_bank', 'no_rekening', 'email', 'password', 'picturePath'];

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
