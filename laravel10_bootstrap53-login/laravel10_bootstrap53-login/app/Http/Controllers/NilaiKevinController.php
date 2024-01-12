<?php

namespace App\Http\Controllers;

use App\Models\NilaiKevin;
use Illuminate\Http\Request;

class NilaiKevinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = NilaiKevin::get();
        return view('nilai.index', compact('nilaikevin'));
    }

    public function cetak_nilaikevin () {
        $siswa = Siswa::get();
        return view ('nilai.cetak_nilaikevin', compact('nilaikevin'));
        
    }
}