<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun_model;

class AkunController extends Controller
{
    public function index(){
        $myakun = new Akun_model();
        $akun = $myakun->tampil_data();
        
        $data = array('akun' => $akun);
        return view('akun/index', $data);
    }

    public function tambah(){
       // return ('Testing');
       return view('akun/tambah');
    }

    public function tambah_proses(Request $request){
        // return ('Testing Proses');
        $query = \DB::table('tabel_akuntansi_master')
        ->insert([
            'nomor_perkiraan'  =>  $request->nomor_perkiraan,
            'nama_perkiraan'  =>  $request->nama_perkiraan,
            'kelompok'  =>  $request->kelompok
        ]);
        return redirect('akun');
    }

    public function edit($id){
        // return ('Testing');
        $akun = \DB::table('tabel_akuntansi_master')->where('id', $id)->first();
        //dd($akun);
        $data = array('akun' => $akun);
        return view('akun/edit', $data);
    }

    public function edit_proses(Request $request){
        // return ('Testing Proses');
        $query = \DB::table('tabel_akuntansi_master')->where('id',$request->id)
        ->update([
            'nomor_perkiraan'   =>  $request->nomor_perkiraan,
            'nama_perkiraan'    =>  $request->nama_perkiraan,
            'kelompok'          =>  $request->kelompok
        ]);
        return redirect('akun');
    }

    public function delete ($id){
        $query = \DB::table('tabel_akuntansi_master')->where('id',$id)->delete();
        return redirect('akun');
    }
}
