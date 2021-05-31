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
        $admin->email = "hilya@gmail.com";
        $admin->password = bcrypt('12345678');
        $admin->save();
        
        $admin2 = new AdminModel();
        $admin2->nama_admin = "Rizqi Maulana";
        $admin2->alamat = "Cirebon";
        $admin2->no_telp = "0987654321";
        $admin2->email = "rizqi@gmail.com";
        $admin2->password = bcrypt('12345678');
        $admin2->save();

        $admin = new AdminModel();
        $admin->nama_admin = "Zulfa";
        $admin->alamat = "Indramayu";
        $admin->no_telp = "0987654321";
        $admin->email = "zulfa@gmail.com";
        $admin->password = bcrypt('12345678');
        $admin->save();

        
    }
}
