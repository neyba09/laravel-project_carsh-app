<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users_status;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // $faker = Faker::create('en_GB');
        $last_name = [
            'Душаев',
            'Котельников',
            'Сазонов',
            'Иванов'
        ];
        $rand_last_name = array_rand($last_name); 
        $first_name = [
            'Дамир',
            'Илья',
            'Станислав',
            'Николай'
        ];
        $rand_first_name = array_rand($first_name);
        $middle_name = [
            'Сергеевич',
            'Игоревич',
            'Максимович',
            'Васильевич'
        ];
        $rand_middle_name = array_rand($middle_name);
        $data= [
            'last_name' => $last_name[$rand_last_name],
            'first_name' => $first_name[$rand_first_name],
            'middle_name' => $middle_name[$rand_middle_name],
            'phone_number' => 89*1000000000+rand(100000000, 999999999),
            'passport_series' => 56*100+rand(10,99),
            'passport_num' => rand(100000, 999999),
            'users_status_id' => Users_status::all('id')->random()->id,
            'created_at' => now(),
        ];
        DB::table('users')->insert($data);
    }
}
