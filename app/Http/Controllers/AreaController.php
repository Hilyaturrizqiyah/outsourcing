<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use Response;

use App\AreaModel;

use App\kota_kabupatenModel;

use App\provinsiModel;


class AreaController extends Controller {

  public function chained_dopdown(){

    $provinsi=provinsiModel::all();


    return view('tenagakerja.halaman.chained-dropdown')->with('provinsi',$provinsi);

  }


  public function getKotaKabupaten($param){

      //GET THE ACCOUNT BASED ON TYPE

      $empData['data'] = kota_kabupatenModel::where('id_provinsi','=',$param)->get();

      return response()->json($empData);

    }


    public function getArea($param){

      //GET THE ACCOUNT BASED ON TYPE

      $area = AreaModel::where('id_kotaKabupaten','=',$param)->get();

      //CREATE AN ARRAY 

      $options = array();      

      foreach ($area as $arrayForEach) {

                $options += array($arrayForEach->id_area => $arrayForEach->nama_area);                

            }

      

      return Response::json($options);


    }



}