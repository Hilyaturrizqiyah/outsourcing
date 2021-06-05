<?php

use App\AdminModel;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new AdminModel();
        $admin->nama_admin = "Hilya";
        $admin->alamat = "Indramayu";
        $admin->no_telp = "0987654321";
        $admin->email = "hilyaA@gmail.com";
        $admin->password = bcrypt('12345678');
        $admin->save();
        
        $admin2 = new AdminModel();
        $admin2->nama_admin = "Rizqi Maulana";
        $admin2->alamat = "Cirebon";
        $admin2->no_telp = "0987654321";
        $admin2->email = "rizqiA@gmail.com";
        $admin2->password = bcrypt('12345678');
        $admin2->save();

        $admin3 = new AdminModel();
        $admin3->nama_admin = "Zulfa";
        $admin3->alamat = "Indramayu";
        $admin3->no_telp = "0987654321";
        $admin3->email = "zulfaA@gmail.com";
        $admin3->password = bcrypt('12345678');
        $admin3->save();

        $admin4 = new AdminModel();
        $admin4->nama_admin = "Admin";
        $admin4->alamat = "Indramayu";
        $admin4->no_telp = "0987654321";
        $admin4->email = "admin@gmail.com";
        $admin4->password = bcrypt('admin');
        $admin4->save();

        
    }
}
