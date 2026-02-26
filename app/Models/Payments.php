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
        'deposit_amount',
        'checkout_session_id',
        'remaining_amount',
    ];

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';
}
