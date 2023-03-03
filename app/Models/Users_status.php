<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_status extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_status'
    ];

    public function users() 
    {
        return $this -> hasMany(Users::class, 'users_status_id', 'id');
    }
}
