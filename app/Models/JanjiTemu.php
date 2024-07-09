<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadwal() : BelongsTo {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }
}
