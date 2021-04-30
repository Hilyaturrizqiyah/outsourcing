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
            $customer->id_area = 1;
            $customer->nama_customer = "Zulfa Khoerul";
            $customer->alamat = "Indramayu";
            $customer->no_telp = "089123456789";
            $customer->email = "zulfa@gmail.com";
            $customer->password = bcrypt('zulfa123');
            $customer->save();

            $customer2 = new CustomerModel();
            $customer2->id_area = 1;
            $customer2->nama_customer = "Hilya";
            $customer2->alamat = "Indramayu";
            $customer2->no_telp = "089123456456";
            $customer2->email = "hilya@gmail.com";
            $customer2->password = bcrypt('hilya123');
            $customer2->save();


    }
}
