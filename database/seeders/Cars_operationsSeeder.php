<?php

namespace Database\Seeders;

use App\Http\Resources\CarsStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cars_operations;

class Cars_operationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cars_operations::factory()->count(5)->create();
    }
}
