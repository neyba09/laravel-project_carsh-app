<?php

namespace Database\Seeders;

use App\Http\Resources\CarsStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cars;
use App\Models\Cars_status;
use App\Models\Users;

class Cars_operationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars_operations')->insert([
            'cars_id' => Cars::all('id')->random()->id,
            'users_id' => Users::all('id')->random()->id,
            'cars_status_id' => Cars_status::all('id')->random()->id,
            'data_time_operation' => now(),
            'GPS_cars_latitude' => rand(1000,99999).'.'.rand(1000,99999),
            'GPS_cars_longitude' => rand(1000,99999).'.'.rand(1000,99999),
        ]);
    }
}
