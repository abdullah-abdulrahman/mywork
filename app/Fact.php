<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    protected $fillable = [
        'num_one',
        'num_two',
        'num_three',
        'num_four',
        'fact_one',
        'fact_two',
        'fact_three',
        'fact_four'
    ];
}
