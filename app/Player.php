<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
     protected $fillable = [
        'name', 'bday','category','height','weight','category','team',
    ];
    
}
