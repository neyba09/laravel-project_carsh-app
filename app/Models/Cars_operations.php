<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars_operations extends Model
{

    /**
     *
     * @var bigInteger
     */
    
    protected $table = 'cars_operations';
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'cars_id',
        'users_id',
        'cars_status_id',
        'data_time_operation',
        'GPS_cars_latitude',
        'GPS_cars_longitude',
    ];

    public function cars() {
        return $this->belongsTo(Cars::class);
    }

    public function users() {
        return $this->belongsTo((Users::class));
    }

    public function cars_status() {
        return $this->belongsTo(Cars_status::class);
    }

    public function cars_mark() {
        return $this->belongsTo(Cars_mark::class);
    }

    public function cars_models() {
        return $this->belongsTo(Cars_models::class);
    }

}
