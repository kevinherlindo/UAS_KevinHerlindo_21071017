<?php

namespace App\Models\GalehLudi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 't_matakuliah';

    protected $primaryKey = 'mkid';
    public $incrementing = false;
    protected $keyType = 'string';

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    public function kurikulum(): BelongsTo
    {
        return $this->belongsTo(Kurikulum::class, 'kurikulum_id');
    }
}
