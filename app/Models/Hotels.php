<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hotels extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'image',
        'name',
        'type',
        'short_description',
        'description_establishment',
        'description_accommodation',
        'city_id',
        'country_id',
        'address',
        'latitude',
        'longitude',
        'price_per_night',
        'currency',
        'check_in_time',
        'check_out_time',
        'free_cancellation_hours',
        'reservations_count',
        'rating',
        'reviews_count',
        'active',
        'manager_id',
    ];

    protected $table = 'hotels';

    protected $primaryKey = 'id_hotel';
}
