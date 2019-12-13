<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    protected $table = 'project_users';

    public function company(){
        return $this->hasOne('App\Models\Company');
    }

    public function user(){
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }
}
