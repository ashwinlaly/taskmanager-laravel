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
        $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
}
