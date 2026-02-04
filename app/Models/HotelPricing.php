<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HotelPricing extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'room_id',
        'label',
        'nights',
        'price',
    ];

    protected $table = 'hotel_pricings';

    protected $primaryKey = 'id_pricing';
}
