<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cars_models;
use App\Models\Cars_status;
use Illuminate\Support\Str;
use App\Models\Cars_dvs_type;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        

        $Strings = 'abcdefghijklmnopqrstuvwxyz';
        return [
            'id'=>Str::uuid(),
            'cars_models_id' => Cars_models::inRandomOrder()->first(),
            'car_number' => substr(str_shuffle($Strings), 0, 1).rand(100,999).substr(str_shuffle($Strings), 0, 2),
            'car_year' => rand(1999,2023),
            'cars_dvs_type_id' => Cars_dvs_type::inRandomOrder()->first(),
            'cars_status_id' => Cars_status::inRandomOrder()->first(), 
        ];
    }
}
