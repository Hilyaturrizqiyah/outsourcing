<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\AdminModel;
use App\Http\Resources\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Area;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = AdminModel::get();
        return Admin::collection($admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admins = new AdminModel();
        $admins->nama_admin = $request->input('nama_admin');
        $admins->alamat = $request->input('alamat');
        $admins->no_telp = $request->input('no_telp');
        $admins->email = $request->input('email');
        $admins->password = $request->input('password');

        if($admins->save()) {
            return new Admin($admins);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_admin)
    {
        $admins = AdminModel::findOrFail($id_admin);
        return new Admin($admins);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_admin)
    {
        $admins = AdminModel::findOrFail($id_admin);
        $admins->nama_admin = $request->input('nama_admin');
        $admins->alamat = $request->input('alamat');
        $admins->no_telp = $request->input('no_telp');
        $admins->email = $request->input('email');
        $admins->password = $request->input('password');

        if($admins->save()) {
            return new Area($admins);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_admin)
    {
        $admins = AdminModel::findOrFail($id_admin);
        if($admins->delete()) {
            return new Admin($admins);
        }
    }
}
