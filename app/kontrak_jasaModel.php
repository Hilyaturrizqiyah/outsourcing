<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontrak_jasaModel extends Model
{
    protected $table = 'kontrak_jasa';
    protected $primaryKey = 'id_kontrak';
    protected $fillable = ['id_customer', 'id_jasa', 'id_outsourcing', 'tgl_mulai_kontrak', 'lama_kontrak', 'jumlah_tenagaKerja', 'jumlah_harga', 'status_kontrak'];

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'id_customer');
    }

    public function jasa()
    {
        return $this->belongsTo(jasaModel::class, 'id_jasa');
    }

    public function outsourcing()
    {
        return $this->belongsTo(OutsourcingModel::class, 'id_outsourcing');
    }

    public function komplain()
    {
        return $this->belongsToMany(komplainModel::class, 'komplain', 'id_kontrak'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function tenagaKerja()
    {
        return $this->belongsToMany(tenaga_kerjaModel::class, 'tenaga_kerja', 'id_kontrak'); //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
