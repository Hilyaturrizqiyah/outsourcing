<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jasaModel extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'id_jasa';
    protected $fillable = ['id_outsourcing', 'id_jenisJasa', 'nama_jasa'];

    public function jenis_jasa()
    {
        return $this->belongsTo(JenisJasaModel::class, 'id_jenisJasa');
    }

    public function outsourcing()
    {
        return $this->belongsTo(OutsourcingModel::class, 'id_outsourcing');
    }

    public function biaya_perlengkapan()
    {
        return $this->belongsToMany(Biaya_perlengkapanModel::class, 'biaya_perlengkapan', 'id_jasa'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function biaya_tenaga()
    {
        return $this->belongsToMany(biaya_tenagaModel::class, 'biaya_tenaga', 'id_jasa'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
