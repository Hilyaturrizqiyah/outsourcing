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
        $area->id_kotaKabupaten = "1";
        $area->nama_area = "Lohbener";
        $area->save();
    }
}
