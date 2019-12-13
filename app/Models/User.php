<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    protected $hidden = ['password'];

    public function getStatusAttribute($attribute){
        return [
            '1' => 'Active',
            '2' => 'In-Active',
            '3' => 'Removed'
        ][$attribute];
    }

    public function city(){
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    public function role(){
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    public function company(){
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function projects(){
        return $this->hasManyThrough('App\Models\Project',
                                     'App\Models\ProjectUser', 
                                     'user_id',
                                     'id'
                                    );
    }
}
