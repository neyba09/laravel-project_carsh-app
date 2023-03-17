<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cars;
use App\Models\Cars_status;
use App\Models\Users;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Cars_operationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() :array
    {
        return [
                'id'=>Str::uuid(),
                'cars_id' => Cars::inRandomOrder()->first(),
                'users_id' => Users::inRandomOrder()->first(),
                'cars_status_id' => Cars_status::inRandomOrder()->first(),
                'data_time_operation' => now(),
                'GPS_cars_latitude' => rand(1000,99999).'.'.rand(1000,99999),
                'GPS_cars_longitude' => rand(1000,99999).'.'.rand(1000,99999),
                'created_at' => now()
            ]; 
    }
}
