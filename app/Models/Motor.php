<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    public function orderDetail(){
        return $this->hasMany('App\Models\OrderDetail', 'motor_id', 'id');
    }
}
