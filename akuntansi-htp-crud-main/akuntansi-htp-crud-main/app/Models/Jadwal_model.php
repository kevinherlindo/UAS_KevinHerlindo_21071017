<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_model extends Model
{
    use HasFactory;

    protected $table="t_jadwal";
    protected $primaryKey ="jadwal_id";

    public function tampil_jadwal(){
        // select 
        // m.nama_mk,
        // d.nama_dosen,
        // j.tahun_id, j.jam_mulai, j.jam_selesai,
        // h.nama_hari,
        // p.nama_prodi,
        // r.nama_ruang,
        // k.nama_kelas
        // from t_jadwal j
        // left outer join t_dosen d on d.dosen_id=j.dosen_id
        // left outer join t_matakuliah m on m.mkid=j.mkid
        // left outer join t_hari h on h.hari_id=j.hari_id
        // left outer join t_prodi p on p.prodi_id=j.prodi_id
        // left outer join t_ruang r on r.ruang_id=j.ruang_id
        // left outer join t_kelas k on k.kelas_id=j.kelas_id

        $query=\DB::table('t_jadwal')
        ->select('t_jadwal.*', 't_dosen.nama_dosen','t_matakuliah.nama_mk')
        ->join('t_dosen', 't_dosen.dosen_id', '=', 't_jadwal.dosen_id')
        ->join('t_matakuliah', 't_matakuliah.mkid', '=', 't_jadwal.mkid')
        
        
        ->get();
        return $query;

        
    }
}
