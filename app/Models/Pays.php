<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pays extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_pays',
    ];

    protected $table = 'pays';

    protected $primaryKey = 'id_pays';
}
