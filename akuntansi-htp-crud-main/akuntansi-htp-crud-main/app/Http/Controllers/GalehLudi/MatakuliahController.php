<?php

namespace App\Http\Controllers\GalehLudi;

use App\Http\Controllers\Controller;
use App\Models\GalehLudi\Matakuliah;
use Illuminate\View\View;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(): View
    {
        $matakuliah = Matakuliah::select([
            'kurikulum_id',
            'nama_mk',
            'sks',
            'semester'
        ])->with([
            'kurikulum:kurikulum_id,nama_kurikulum'
        ])->get();

        return view('GalehLudi.matakuliah.index', compact('matakuliah'));
    }
}
