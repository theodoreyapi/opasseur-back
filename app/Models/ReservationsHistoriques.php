<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReservationsHistoriques extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'changed_by',
        'reservation_id',
        'old_status',
        'new_status',
        'note',
    ];

    protected $table = 'reservation_histories';

    protected $primaryKey = 'id_reservation_history';
}
