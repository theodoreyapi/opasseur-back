<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payments extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'reservation_id',
        'amount',
        'method',
        'payment_method',
        'status',
        'transaction_id',
    ];

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';
}
