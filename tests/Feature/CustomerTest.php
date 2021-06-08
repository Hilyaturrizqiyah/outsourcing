<?php

namespace Tests\Feature;

use App\CustomerModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CustomerTest extends TestCase
{

    public function testRegister()
    {
        $password = bcrypt('12345678');

        CustomerModel::create([
            'id_area' => 1,
            'nama_customer' => 'Mizzaa',
            'alamat' => 'Cirebon',
            'no_telp' => '089123456789',
            'email' => 'mizza123@gmail.com',
            'password' =>  $password,
            'foto_profil' => 'dimas.jpg',
        ]);


        $this->assertDatabaseHas('customer', [
            'id_area' => 1,
            'nama_customer' => 'Mizzaa',
            'alamat' => 'Cirebon',
            'no_telp' => '089123456789',
            'email' => 'mizza123@gmail.com',
            'password' =>  $password,
            'foto_profil' => 'dimas.jpg'
        ]);
    }
}
