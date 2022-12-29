<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mycart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'car_id',
        'user_id',
        'reserved',
        'plate_id',
        'pickup',
        'return',
        'payment'
    ];
    public $timestamps = false;

    public function car(){
        return $this->belongsTo(Car::class,'car_id');
    }
}
