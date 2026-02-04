<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rooms extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'hotel_id',
        'name',
        'bedrooms',
        'bathrooms',
        'living_rooms',
        'capacity',
        'price_per_night',
        'is_available',
    ];

    protected $table = 'rooms';

    protected $primaryKey = 'id_room';
}
