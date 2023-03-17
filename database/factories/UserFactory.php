<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Users_status;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $last_name = [
            'Душаев',
            'Котельников',
            'Сазонов',
            'Иванов'
        ];

        $first_name = [
            'Дамир',
            'Илья',
            'Станислав',
            'Николай'
        ];
        
        $middle_name = [
            'Сергеевич',
            'Игоревич',
            'Максимович',
            'Васильевич'
        ];
        
        return [
            'id'=>Str::uuid(),
            'last_name' => $last_name[array_rand($last_name)],
            'first_name' => $first_name[array_rand($first_name)],
            'middle_name' => $middle_name[array_rand($middle_name)],
            'phone_number' => 89*1000000000+rand(100000000, 999999999),
            'passport_series' => 56*100+rand(10,99),
            'passport_num' => rand(100000, 999999),
            'users_status_id' => Users_status::inRandomOrder()->first(),
            'created_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
}
