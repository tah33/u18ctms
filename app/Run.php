<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    protected $table = 'runs';
    protected $fillable = [
        'team', 'ov1', 'ov2','ov3','ov4','ov5','total','run_rate',
    ];
}
