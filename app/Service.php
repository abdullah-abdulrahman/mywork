<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Project', 'service_id', 'id');
    }

}
