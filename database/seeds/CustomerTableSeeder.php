<?php

use App\CustomerModel;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new CustomerModel();
            $customer->nama_customer = "Zulfa Khoerul";
            $customer->alamat = "Indramayu";
            $customer->no_telp = "089123456789";
            $customer->email = "zulfaC@gmail.com";
            $customer->password = bcrypt('zulfa123');
            $customer->save();

            $customer2 = new CustomerModel();
            $customer2->nama_customer = "Polindra";
            $customer2->alamat = "Indramayu";
            $customer2->no_telp = "089123456456";
            $customer2->email = "polindra@gmail.com";
            $customer2->password = bcrypt('123456789');
            $customer2->save();

            $customer3 = new CustomerModel();
            $customer3->nama_customer = "Rizqi Maulana";
            $customer3->alamat = "Cirebon";
            $customer3->no_telp = "089123456456";
            $customer3->email = "rizqiC@gmail.com";
            $customer3->password = bcrypt('rizqi123');
            $customer3->save();


    }
}
