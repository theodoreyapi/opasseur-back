<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PromosCodes extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'used_count',
        'starts_at',
        'expires_at',
        'active',
    ];

    protected $table = 'promos_codes';

    protected $primaryKey = 'id_promo_code';
}
