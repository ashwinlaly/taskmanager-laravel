<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function getStatusAttribute($attribute){
        return [
            '1' => 'Active',
            '2' => 'In-Active',
            '3' => 'Removed'
        ][$attribute];
    }
        
}
