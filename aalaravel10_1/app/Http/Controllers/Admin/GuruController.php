<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru_model;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru_model::get();
      return view('admin.guru.index', compact('guru'));
    }
}
