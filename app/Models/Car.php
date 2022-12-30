<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'car_id',
        'car_model',
        'car_brand',
        'year',
        'plate_id',
        'status',
        'office_id',
        'price',
        'color',
    ];
    public $timestamps = false;

    protected $primaryKey = 'car_id';

        public function office(){
            return $this->belongsTo(Office::class,'office_id');
        }
}
