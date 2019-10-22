<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'teams_id';
     protected $fillable = [
        'team','coach','manager',
    ];
}
