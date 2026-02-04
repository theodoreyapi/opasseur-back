<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HotelAmenities extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'hotel_id',
        'name',
        'icon',
        'available',
    ];

    protected $table = 'hotel_amenities';

    protected $primaryKey = 'id_amenity';
}
