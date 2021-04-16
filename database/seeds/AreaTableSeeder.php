<?php

use App\AreaModel;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new AreaModel();
        $area->provinsi = "Jawa Barat";
        $area->kota_kabupaten = "Indramayu";
        $area->kecamatan = "Indramayu";
        $area->save();
    }
}
