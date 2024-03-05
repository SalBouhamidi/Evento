<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'address',
        'ville_id',
        'event_id',
    ];

    public function events(): BelongsTo
    {
        return $this->belongsTo(event::class);
    }

    public function villes(): BelongsTo
    {
        return $this->belongsTo(ville::class);
    }
}
