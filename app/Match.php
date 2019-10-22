<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
     protected $fillable = [
        'team1', 'team2', 'venue','location','time','match_name',
    ];
}
