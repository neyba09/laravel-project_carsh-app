<?php

namespace Database\Seeders;

use App\Models\Cars_dvs_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cars_models;
use App\Models\Cars_status;
use Illuminate\Support\Str;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Strings = 'abcdefghijklmnopqrstuvwxyz';
            DB::table('cars')->insert([
                'cars_models_id' => Cars_models::all('id')->random()->id,
                'car_number' => substr(str_shuffle($Strings), 0, 1).rand(100,999).substr(str_shuffle($Strings), 0, 2),
                'car_year' => rand(1999,2023),
                'cars_dvs_type_id' => Cars_dvs_type::all('id')->random()->id,
                'cars_status_id' => Cars_status::all('id')->random()->id, 
            ]);
    }
}
