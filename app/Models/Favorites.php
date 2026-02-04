<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Favorites extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'room_id',
        'hotel_id',
    ];

    protected $table = 'favorites';

    protected $primaryKey = 'id_favorite';
}
