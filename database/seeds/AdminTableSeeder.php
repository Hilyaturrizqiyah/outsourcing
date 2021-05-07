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
        $admin->nama_admin = "Rizqi Maulana";
        $admin->alamat = "Cirebon";
        $admin->no_telp = "0987654321";
        $admin->email = "rizqi@gmail.com";
        $admin->password = bcrypt('12345678');
        $admin->save();
    }
}
