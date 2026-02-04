<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Politique extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'content',
    ];

    protected $table = 'politique';

    protected $primaryKey = 'id_politique';
}
