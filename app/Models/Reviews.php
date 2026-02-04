<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reviews extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'hotel_id',
        'user_id',
        'rating',
        'comment',
    ];

    protected $table = 'reviews';

    protected $primaryKey = 'id_review';
}
