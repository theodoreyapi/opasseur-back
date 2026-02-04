<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mention extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'content',
    ];

    protected $table = 'mention';

    protected $primaryKey = 'id_mention';
}
