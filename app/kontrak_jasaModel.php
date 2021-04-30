<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontrak_jasaModel extends Model
{
    protected $table = 'kontrak_jasa';
    protected $primaryKey = 'id_kontrak';
    protected $fillable = ['id_customer', 'id_jasa', 'id_outsourcing', 'tgl_mulai_kontrak', 'lama_kontrak', 'jumlah_tenagaKerja', 'jumlah_harga', 'status_kontrak'];

}