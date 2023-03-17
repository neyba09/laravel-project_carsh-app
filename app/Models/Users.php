<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Users extends Model
{
    use HasUuids;
    use HasFactory;
    //  protected $guarded = false;
    protected $table = 'users'; 
    protected $fillable = [
        'id', 
        'last_name', 
        'first_name', 
        'middle_name', 
        'phone_number', 
        'passport_series', 
        'passport_num', 
        'users_status_id',
        'created_at',
        'updated_at',
    ];

    public function users_status() 
    {
        return $this -> belongsTo(Users_status::class);
    }

    public function cars_operations() 
    {
        return $this -> hasMany(Cars_operations::class, 'users_id', 'id');
    }
}
