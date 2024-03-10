<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Place extends Model
{
    use HasFactory;
    // protected $table='place';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'address',
        'ville_id',
        'event_id',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(event::class);
    }

    public function ville(): BelongsTo
    {
        return $this->belongsTo(ville::class);
    }
}
