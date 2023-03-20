<?php

namespace Tests\Feature;

use App\Models\Cars;
use App\Models\Cars_operations;
use App\Models\Cars_status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Cars_operationsSeeder;

class CarsOperationsTest extends TestCase
{
    public function testCarsOperationsIndex()
    {
        $response = $this->get('/api/carsoperations');

        $response->assertStatus(200);

        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'cars_id',
                         'users_id',
                         'cars_status_id',
                         'data_time_operation',
                         'GPS_cars_latitude',
                         'GPS_cars_longitude'
                    ]
                ]
            ]);
    }
    
    public function testCarsOperationsStore()

    {
        $response = $this->postJson('/api/carsoperations', 
            [
                'cars_id'=>Cars::inRandomOrder()->first()->id,
                'users_id'=>User::inRandomOrder()->first()->id,
                'cars_status_id'=>Cars_status::inRandomOrder()->first()->id,
                'data_time_operation'=>now(),
                'GPS_cars_latitude'=>42462.35008,
                'GPS_cars_longitude'=>42462.35008
            ]);
        $response
            ->assertStatus(201);
    }

    public function testCarsOperationsShow()
    {
        $response = $this->get('/api/carsoperations/'. Cars_operations::inRandomOrder()->first()->id);
        $response->assertStatus(200)
                
                ->assertJsonStructure([
                    'data' => [
                         'id',
                         'cars_id',
                         'users_id',
                         'cars_status_id',
                         'data_time_operation',
                         'GPS_cars_latitude',
                         'GPS_cars_longitude'
                    ]
        ]);
    }

    public function testCarsOperationsUpdate()

    {
        $response = $this->put('/api/carsoperations/'. Cars_operations::inRandomOrder()->first()->id, 
        [
                'cars_id'=>Cars::inRandomOrder()->first()->id,
                'users_id'=>User::inRandomOrder()->first()->id,
                'cars_status_id'=>Cars_status::inRandomOrder()->first()->id,
                'data_time_operation'=>now(),
                'GPS_cars_latitude'=>42462.35008,
                'GPS_cars_longitude'=>42462.35008
        ]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'cars_id',
                    'users_id',
                    'cars_status_id',
                    'data_time_operation',
                    'GPS_cars_latitude',
                    'GPS_cars_longitude'
                ]
                ]);
    }

    public function testCarsOperationsDelete()
    {
        $response = $this->delete('/api/carsoperations/'. Cars_operations::inRandomOrder()->first()->id);
        $response->assertStatus(204);
    }
}
