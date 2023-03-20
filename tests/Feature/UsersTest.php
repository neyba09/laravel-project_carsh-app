<?php

namespace Tests\Feature;

use App\Models\Users;
use App\Models\Users_status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\UserSeeder;

class UsersTest extends TestCase
{
    public function testUsersIndex()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'last_name',
                         'first_name',
                         'middle_name',
                         'phone_number',
                         'passport_series',
                         'passport_num'
                    ]
                ]
            ]);
    }
    
    public function testUsersStore()

    {
        $response = $this->postJson('/api/users', 
            [
                'last_name'=>'Велесова',
                'first_name'=>'Валентина',
                'middle_name'=>'Владимировна',
                'phone_number'=>'8912431212',
                'passport_series'=>'5678',
                'passport_num'=>'451212',
                'users_status_id'=>Users_status::inRandomOrder()->first()->id,
            ]);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'last_name',
                    'first_name',
                    'middle_name',
                    'phone_number',
                    'passport_series',
                    'passport_num'
                ]
                ]);
    }

    public function testUsersShow()
    {
        $response = $this->get('/api/users/'.Users::inRandomOrder()->first()->id);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'last_name',
                        'first_name',
                        'middle_name',
                        'phone_number',
                        'passport_series',
                        'passport_num'
                    ]
        ]);
    }

    public function testUsersUpdate()

    {
        $response = $this->put('/api/users/'.Users::inRandomOrder()->first()->id, 
        [
            'last_name'=>'Савельев',
            'first_name'=>'Евгений',
            'middle_name'=>'Викторович',
            'phone_number'=>'8922431212',
            'passport_series'=>'5678',
            'passport_num'=>'451212',
            'users_status_id'=>Users_status::inRandomOrder()->first()->id
        ]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'last_name',
                    'first_name',
                    'middle_name',
                    'phone_number',
                    'passport_series',
                    'passport_num'
                ]
                ]);
    }

    public function testUsersDelete()
    {
        $response = $this->delete('/api/users/'.Users::inRandomOrder()->first()->id);
        $response->assertStatus(204);
    }
}
