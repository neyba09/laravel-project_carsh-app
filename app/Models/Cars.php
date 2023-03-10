<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $guarded = false;
    protected $table = 'cars';
    protected $fillable = [
        'id',
        'cars_models_id',
        'car_number',
        'car_year',
        'cars_dvs_type_id',
        'cars_status_id'
    ];

    public function cars_dvs_type() 
    {
        return $this->belongsTo(Cars_dvs_type::class);
    }

    public function cars_models() 
    {
        return $this->belongsTo(Cars_models::class);
    }

    public function cars_status()
    {
        return $this->belongsTo(Cars_status::class); 
    }

    public function cars_operations() {
        return $this->hasMany(Cars_operations::class, 'cars_id', 'id');
    }
}
