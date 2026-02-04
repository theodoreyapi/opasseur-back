<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubscriptionPlans extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'price',
        'duration_type',
        'active',
    ];

    protected $table = 'subscription_plans';

    protected $primaryKey = 'id_subscription_plan';
}
