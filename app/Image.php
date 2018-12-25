<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'project_id',
        'image'
    ];
    
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }
}
