<?php

use App\JenisJasaModel;
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
        $jenis_jasa = new JenisJasaModel();
        $jenis_jasa->nama_jenisJasa = "Satpam";
        $jenis_jasa->deskripsi = "KeamananKeamanan";
        $jenis_jasa->save();

        $jenis_jasa2 = new JenisJasaModel();
        $jenis_jasa2->nama_jenisJasa = "Office Boy";
        $jenis_jasa2->deskripsi = "KebersihanKebersihan";
        $jenis_jasa2->save();
    }
}
