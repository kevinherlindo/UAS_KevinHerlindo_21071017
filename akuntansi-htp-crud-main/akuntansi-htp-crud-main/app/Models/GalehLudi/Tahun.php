<?php

namespace App\Models\GalehLudi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $table = 't_tahun';
    protected $primaryKey = 'tahun_id';
    protected $keyType = 'string';
}
