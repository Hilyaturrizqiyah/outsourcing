<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranPerlengkapanModel extends Model
{
    protected $table = 'pembayaran_perlengkapan';
    protected $primaryKey = 'id_pembayaranPerlengkapan';
    protected $fillable = ['id_outsourcing','id_kontrak','nama_pembayaran','nominal','bukti_tf','waktu_bayar','status_bayar'];

}
