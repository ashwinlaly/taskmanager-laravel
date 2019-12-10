<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function getStatusAttribute($attribute){
        return [
            '1' => 'Active',
            '2' => 'In-Active',
            '3' => 'Removed'
        ][$attribute];
    }
}
