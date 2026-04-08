<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = [
        'nom_pays',
    ];

    protected $table = 'pays';

    protected $primaryKey = 'id_pays';
}
