<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_model;

class JadwalController extends Controller
{
    public function index(){
        // return ('ABC');
        $myjadwal = new Jadwal_model();
        $jadwal   = $myjadwal->tampil_jadwal();
        //dd($jadwal);

        $data = array('jadwal' => $jadwal);
        return view('jadwal/index', $data);
    }
}
