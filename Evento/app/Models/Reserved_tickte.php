<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserved_tickte extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'reservation_id',
        'ticket_id',
    ];
}
