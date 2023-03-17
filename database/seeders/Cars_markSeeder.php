<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cars_markSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marks = [
            'Daewoo',
            'Nissan',
            'KIA',
            'Toyota',
    ];

    foreach ($marks as $mark) {
        DB::table('cars_marks')->insert([
            'id'=>Str::uuid(),
            'car_mark' => $mark,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
    }
}
