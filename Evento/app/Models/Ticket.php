<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ticket extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
        'event_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function reservations(){
        return $this->belongsToMany(Reservation::class, 'Reserved_tickte');
    }
}
