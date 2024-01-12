<?php

namespace App\Models\GalehLudi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $table = 't_hari';
    protected $primaryKey = 'hari_id';
    protected $keyType = 'string';
}
