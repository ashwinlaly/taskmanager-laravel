<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';

    protected $guarded = [];
    
    public function getStatusAttribute($attribute){
        return [
            '1' => 'Pending',
            '2' => 'Completed'
        ][$attribute];
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

}
