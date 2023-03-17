<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users_status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Users_statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
            {
                $statuses = [
                        'Активный',
                        'Неактивный',
                        'Заблокирован',
                        'Удаленный',
                ];
        
                foreach ($statuses as $status) {
                    DB::table('users_statuses')->insert([
                        'id'=>Str::uuid(),
                        'user_status' => $status,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
}
