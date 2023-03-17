<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarsstatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $statuses = [
                    'Движение',
                    'Остановка',
                    'Взятие в аренду',
                    'Сдача из аренды',
            ];
    
            foreach ($statuses as $status) {
                DB::table('cars_statuses')->insert([
                    'id'=>Str::uuid(),
                    'car_status' => $status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
    }
}
