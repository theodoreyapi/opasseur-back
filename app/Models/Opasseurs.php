<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Opasseurs extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username_opasseur',
        'email_opasseur',
        'telephone_opasseur',
        'password_opasseur',
        'otp_opasseur',
        'code_secure_opasseur',
        'role_opasseur',
        'otp_expire_at',
        'otp_verified',
    ];

    protected $table = 'opasseurs';

    protected $primaryKey = 'id_opasseur';
}
