<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun_model extends Model
{
    use HasFactory;
    protected $table ="tabel_akuntansi_master";
    protected $primaryKey ="id";

    public function tampil_data(){
        $query = \DB::table('tabel_akuntansi_master')->get();
        return $query;
    }
}
