<?php

namespace App\Http\Controllers\GalehLudi;

use App\Http\Controllers\Controller;
use App\Models\GalehLudi\Jadwal;
use Illuminate\View\View;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(): View
    {
        $jadwal = Jadwal::select([
            'mkid',
            'tahun_id',
            'prodi_id',
            'hari_id',
            'dosen_id',
            'jam_mulai',
            'jam_selesai'
        ])->with([
            'matkul:mkid,nama_mk',
            'tahun:tahun_id,nama_tahun',
            'prodi:prodi_id,nama_prodi',
            'hari:hari_id,nama_hari',
            'dosen:dosen_id,nama_dosen',
        ])->get();

        return view('GalehLudi.jadwal.index', compact('jadwal'));
    }
}
