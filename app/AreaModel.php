<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    protected $fillable = ['id_kotaKabupaten', 'nama_area'];

    public function Customer() {
        return $this->belongsToMany(CustomerModel::class,'customer','id_area');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
