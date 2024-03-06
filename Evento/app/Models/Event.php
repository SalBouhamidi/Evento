<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Event extends Model
{
    use HasFactory;

    protected $fillable= [
        'id',
        'name',
        'description',
        'status_validation',
        'status_auto',
        'status',
        'date',
        'user_id',
        'categorie_id',
        'image'

    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function categories() : BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function places(): HasMany
    {
        return $this->hasMany(Place::class);
    }
}
