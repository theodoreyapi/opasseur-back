<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservations extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'room_id',
        'promo_code_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    protected $table = 'reservations';

    protected $primaryKey = 'id_reservation';
}
