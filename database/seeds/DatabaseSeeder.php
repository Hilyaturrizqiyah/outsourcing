<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(jenis_jasaTableSeeder::class);
        $this->call(TenagaKerjaTableSeeder::class);
        //$this->call(OutsourcingTableSeeder::class);
    }
}
