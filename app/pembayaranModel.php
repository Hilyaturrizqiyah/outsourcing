<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_outsourcing', 'id_kontrak', 'nama_pembayaran', 'nominal', 'bukti_tf', 'status_bayar', 'waktu', 'bulan_ke'];

}
