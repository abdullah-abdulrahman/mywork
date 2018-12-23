<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'description',
        'email',
        'keywords',
        'facebook',
        'linkedin',
        'instagram',
        'newsletter'
    ];
}
