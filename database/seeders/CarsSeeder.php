<?php

namespace Database\Seeders;

use App\Models\Cars_dvs_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cars;
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
       Cars::factory()->count(5)->create();
    }
}
