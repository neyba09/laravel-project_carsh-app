<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cars_dvs_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'dvs_type'
    ];

    public function cars() 
    {
        return $this->hasMany(Cars::class, 'cars_dvs_type_id', 'id');
    }

}
