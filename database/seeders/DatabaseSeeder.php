<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\Users_statusSeeder;
use Database\Seeders\Cars_dvs_typesSeeder;
use Database\Seeders\Cars_modelsSeeder;
use Database\Seeders\CarsstatusesSeeder;
use Database\Seeders\CarsSeeder;
use Database\Seeders\Cars_operationsSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            Users_statusSeeder::class,
            UserSeeder::class,
            Cars_dvs_typesSeeder::class,
            Cars_markSeeder::class,
            Cars_modelsSeeder::class,
            CarsstatusesSeeder::class,
            CarsSeeder::class,
            Cars_operationsSeeder::class
        ]);
    }
}