<?php

use App\tenaga_kerjaModel;
use Illuminate\Database\Seeder;

class TenagaKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenagakerja = new tenaga_kerjaModel();
        $tenagakerja->nama_tenagakerja = "Hilya";
        $tenagakerja->no_ktp = "1234567890123451";
        $tenagakerja->email = "hilyaTk@gmail.com";
        $tenagakerja->password = bcrypt('12345678');
        $tenagakerja->status_tenagaKerja = "Pelamar";
        $tenagakerja->save();
        
        $tenagakerja2 = new Tenaga_kerjaModel();
        $tenagakerja2->nama_tenagakerja = "Rizqi Maulana";
        $tenagakerja2->no_ktp = "1234567890123452";
        $tenagakerja2->email = "rizqiTk@gmail.com";
        $tenagakerja2->password = bcrypt('12345678');
        $tenagakerja2->status_tenagaKerja = "Pelamar";
        $tenagakerja2->save();

        $tenagakerja3 = new Tenaga_kerjaModel();
        $tenagakerja3->nama_tenagakerja = "Zulfa";
        $tenagakerja3->no_ktp = "1234567890123453";
        $tenagakerja3->email = "zulfaTk@gmail.com";
        $tenagakerja3->password = bcrypt('12345678');
        $tenagakerja3->status_tenagaKerja = "Pelamar";
        $tenagakerja3->save();

        $tenagakerja4 = new Tenaga_kerjaModel();
        $tenagakerja4->nama_tenagakerja = "TenagaKerja";
        $tenagakerja4->no_ktp = "1234567890123454";
        $tenagakerja4->email = "tenagakerja@gmail.com";
        $tenagakerja4->password = bcrypt('12345678');
        $tenagakerja4->status_tenagaKerja = "Pelamar";
        $tenagakerja4->save();
    }
}
