<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HotelImages extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'room_id',
        'image_path',
        'type',
        'is_main',
    ];

    protected $table = 'hotel_images';

    protected $primaryKey = 'id_image';
}
