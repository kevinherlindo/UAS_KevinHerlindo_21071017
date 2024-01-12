<?php

namespace App\Models\GalehLudi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 't_dosen';
    protected $primaryKey = 'dosen_id';
    protected $keyType = 'string';
}
