<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars_mark extends Model
{
    use HasUuids;
    use HasFactory;
    protected $fillable = [
        'id',
        'car_mark',
    ];

    public function cars_models() {
        return $this -> hasMany(Cars_models::class, 'car_mark_id', 'id');
    }

    public function cars() {
        return $this-> hasManyThrough(Cars::class, Cars_models::class);
    }

    public function cars_operations() {
        return $this-> hasManyThrough(Cars_operations::class, Cars_models::class);
    }
} 

