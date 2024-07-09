<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dokter() : BelongsTo {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }

    public function hari() : BelongsTo {
        return $this->belongsTo(Hari::class, 'hari_id', 'id');
    }

    public function jam() : BelongsTo {
        return $this->belongsTo(Jam::class, 'jam_id', 'id');
    }
}
