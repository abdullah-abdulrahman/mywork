<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedMail extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];

}
