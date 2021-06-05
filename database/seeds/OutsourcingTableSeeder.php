<?php

use App\OutsourcingModel;
use Illuminate\Database\Seeder;

class OutsourcingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outsourcing = new OutsourcingModel();
        $outsourcing->nama_outsourcing = "Hilya";
        $outsourcing->no_ktp = "1234567890123451";
        $outsourcing->email = "hilyaOsr@gmail.com";
        $outsourcing->password = bcrypt('12345678');
        $outsourcing->status_outsourcing = "Menunggu Validasi";
        $outsourcing->save();
        
        $outsourcing2 = new OutsourcingModel();
        $outsourcing2->nama_outsourcing = "Rizqi Maulana";
        $outsourcing2->no_ktp = "1234567890123452";
        $outsourcing2->email = "rizqiOsr@gmail.com";
        $outsourcing2->password = bcrypt('12345678');
        $outsourcing2->status_outsourcing = "Menunggu Validasi";
        $outsourcing2->save();

        $outsourcing3 = new OutsourcingModel();
        $outsourcing3->nama_outsourcing = "Zulfa";
        $outsourcing3->no_ktp = "1234567890123453";
        $outsourcing3->email = "zulfaOsr@gmail.com";
        $outsourcing3->password = bcrypt('12345678');
        $outsourcing3->status_outsourcing = "Menunggu Validasi";
        $outsourcing3->save();

        $outsourcing4 = new OutsourcingModel();
        $outsourcing4->nama_outsourcing = "Outsourcing";
        $outsourcing4->no_ktp = "1234567890123454";
        $outsourcing4->email = "outsourcing@gmail.com";
        $outsourcing4->password = bcrypt('12345678');
        $outsourcing4->status_outsourcing = "Menunggu Validasi";
        $outsourcing4->save();
    }
}
