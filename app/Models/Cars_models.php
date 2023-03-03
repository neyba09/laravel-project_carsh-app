<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars_models extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'car_model',
        'cars_mark_id'
    ];

    public function car_mark() {
        return $this -> belongsTo(Cars_mark::class);
    }

    public function cars() {
        return $this -> hasMany(Cars::class, 'cars_models_id', 'id');
    }
}
