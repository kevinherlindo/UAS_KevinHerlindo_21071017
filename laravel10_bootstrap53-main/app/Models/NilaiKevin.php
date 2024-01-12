<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKevin extends Model
{
    use HasFactory;
    protected $table ="nilaikevins";
    protected $primaryKey ="id";

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru'); //id guru fk
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
   
    public function kurikulum(){
        return $this->belongsTo(kurikulum::class, 'id');
    }
}
