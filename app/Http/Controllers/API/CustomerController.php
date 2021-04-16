<?php

namespace App\Http\Controllers\API;

use App\CustomerModel;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Mengambil Semua Artikel
    public function index()
    {
        $customer = CustomerModel::get();
        return Customer::collection($customer);
    }
// Membuat Artikel Baru
    public function store(Request $request)
    {
        $customer = new CustomerModel();
        $customer->nama_customer = $request->input('nama');
        $customer->alamat = $request->input('alamat');
        $customer->no_telp = $request->input('no_telp');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');

        if($customer->save()) {
            return new Customer($customer);
        }
    }
// Mengambil Satu Artikel
    public function show($id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        return new Customer($customer);
    }
// Mengubah Artikel
    public function update(Request $request, $id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        $customer->nama_customer = $request->input('nama');
        $customer->alamat = $request->input('alamat');
        $customer->no_telp = $request->input('no_telp');
        $customer->email = $request->input('email');
        $customer->password = $request->input('password');

        if($customer->save()) {
            return new Customer($customer);
        }
    }
// Menghapus Artikel
    public function destroy($id_customer)
    {
        $customer = CustomerModel::findOrFail($id_customer);
        if($customer->delete()) {
            return new Customer($customer);
        }
    }
}
