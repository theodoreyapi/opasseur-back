<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserSubscriptions extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'start_date',
        'end_date',
        'status',
        'auto_renew',
    ];

    protected $table = 'user_subscriptions';

    protected $primaryKey = 'id_user_subscription';
}
