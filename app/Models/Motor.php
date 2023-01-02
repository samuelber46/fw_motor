<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motor extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'image',
        'nama_motor',
        'stok',
        'warna',
        'silinder',
        'transmisi',
        'details',
        'harga',
    ];
    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'motor_id', 'id');
    }
}
