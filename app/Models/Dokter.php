<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokter extends Model
{
    use HasFactory;

    public function spesialis() : BelongsTo {
        return $this->belongsTo(Spesialis::class, 'spesialis_id', 'id');
    }
}
