<?php

use App\jenis_jasaModel;
use Illuminate\Database\Seeder;

class jenis_jasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_jasa = new jenis_jasaModel();
        $jenis_jasa->id_jenisJasa = 1;
        $jenis_jasa->nama_jenisJasa = "Satpam";
        $jenis_jasa->save();
    }
}
