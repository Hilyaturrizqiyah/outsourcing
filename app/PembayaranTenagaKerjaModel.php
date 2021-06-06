<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranTenagaKerjaModel extends Model
{
    protected $table = 'pembayaran_tenaga_kerja';
    protected $primaryKey = 'id_pembayaranTenagaKerja';
    protected $fillable = ['id_outsourcing','id_kontrak','nama_pembayaran','nominal','bukti_tf','waktu_bayar','bulan_ke','status_bayar'];

}
