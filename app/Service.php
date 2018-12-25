<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{   
    protected $fillable = [
        'name',
        'brief_description',
        'description',
        'image'
    ];

    public function projects()
    {
        return $this->hasMany('App\Project', 'service_id', 'id');
    }

}
