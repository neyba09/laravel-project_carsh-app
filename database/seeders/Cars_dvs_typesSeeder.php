<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cars_dvs_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $dvs_types = [
                    'Бензин',
                    'Дизель',
                    'Водород',
                    'ГАЗ',
            ];
    
            foreach ($dvs_types as $dvs_type) {
                DB::table('cars_dvs_types')->insert([
                    'id'=>Str::uuid(),
                    'dvs_type' => $dvs_type,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
