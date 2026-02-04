<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubscriptionPayments extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_subscription_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
    ];

    protected $table = 'subscription_payments';

    protected $primaryKey = 'id_subscription_payment';
}
