<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'service_id'
    ];
    
    public function Service()
    {
        return $this->hasOne('App\Service', 'id', 'service_id');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'project_id', 'id');
    }
}
