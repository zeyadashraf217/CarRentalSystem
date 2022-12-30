<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarUser extends Model
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

    public $table = 'car_users';

    public function car(){
        return $this->belongsTo(Car::class,'car_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
