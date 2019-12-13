<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function getStatusAttribute($attribute){
        return [
            '1' => 'Active',
            '2' => 'In-Active',
            '3' => 'Removed'
        ][$attribute];
    }

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }

}
