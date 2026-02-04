<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Communes extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_commune',
        'pays_id',
    ];

    protected $table = 'communes';

    protected $primaryKey = 'id_commune';
}
