<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'city',
        'country'
    ];
    public $timestamps = false;
    protected $primaryKey = 'Office_id';
}
