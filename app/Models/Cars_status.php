<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Cars_status extends Model
{
    use HasUuids;
    use HasFactory;
    protected $fillable = [
        'id',
        'car_status'
    ];

    public function Cars() {
        return $this -> hasMany(Cars::class, 'cars_status_id', 'id');
    }
}
