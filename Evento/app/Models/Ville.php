<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
    ];

    public function places(): HasMany
    {
        return $this->hasMany(Place::class);
    }
}
