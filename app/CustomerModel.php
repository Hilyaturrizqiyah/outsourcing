<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class CustomerModel extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $fillable = ['id_area', 'nama_customer', 'alamat', 'no_telp', 'email', 'password', 'picturePath'];
    // protected $appends = [
    //     'picturePath'
    // ];
    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'id_area');
    }

    public function kontrakJasa()
    {
        return $this->belongsToMany(kontrak_jasaModel::class, 'kontrak_jasa', 'id_kontrak'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
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
