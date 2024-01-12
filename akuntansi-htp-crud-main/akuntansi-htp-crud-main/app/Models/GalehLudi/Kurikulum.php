<?php

namespace App\Models\GalehLudi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 't_kurikulum';
    protected $primaryKey = 'kurikulum_id';
    protected $keyType = 'string';
}
