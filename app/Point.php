<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
     protected $table='points';
    protected $fillable=['team','match_name'];
}
