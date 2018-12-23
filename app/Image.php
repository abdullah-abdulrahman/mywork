<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
    
    public function project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }
}
