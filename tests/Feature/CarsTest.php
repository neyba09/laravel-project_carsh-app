<?php

namespace Tests\Feature;

use App\Models\Cars;
use App\Models\Cars_dvs_type;
use App\Models\Cars_models;
use App\Models\Cars_status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\CarsSeeder;

class CarsTest extends TestCase
{
    // use RefreshDatabase;

    // public function testCarsSeederCreated()
    // {
    //     $this->seed(CarsSeeder::class);
    // }

    public function testCarsIndex()
    {
        $response = $this->get('/api/cars');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'cars_models_id',
                        'car_number',
                        'car_year',
                        'cars_dvs_type_id',
                        'cars_status_id'
                    ]
                ]
            ]);
    }
    
    public function testCarsStore()

    {
        $response = $this->postJson('/api/cars', 
                [
                    'cars_models_id'=>Cars_models::inRandomOrder()->first()->id,
                    'car_number'=> 'j707em',
                    'car_year'=>2021,
                    'cars_dvs_type_id'=>Cars_dvs_type::inRandomOrder()->first()->id,
                    'cars_status_id'=>Cars_status::inRandomOrder()->first()->id
                ]);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'cars_models_id',
                    'car_number',
                    'car_year',
                    'cars_dvs_type_id',
                    'cars_status_id'
                ]
            ]);
    }

    public function testCarsShow()
    {
        $response = $this->get('/api/cars/'.Cars::inRandomOrder()->first()->id);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'cars_models_id',
                        'car_number',
                        'car_year',
                        'cars_dvs_type_id',
                        'cars_status_id'
                    ]
        ]);
    }

    public function testCarsUpdate()

    {
        $response = $this->put('/api/cars/'.Cars::inRandomOrder()->first()->id, 
            [
                'cars_models_id'=>Cars_models::inRandomOrder()->first()->id,
                    'car_number'=> 'j707em',
                    'car_year'=>2021,
                    'cars_dvs_type_id'=>Cars_dvs_type::inRandomOrder()->first()->id,
                    'cars_status_id'=>Cars_status::inRandomOrder()->first()->id
            ]
        );
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'cars_models_id',
                    'car_number',
                    'car_year',
                    'cars_dvs_type_id',
                    'cars_status_id'
                ]
            ]);
    }

    public function testCarsDelete()
    {
        $response = $this->delete('/api/cars/'.Cars::inRandomOrder()->first()->id);
        $response->assertStatus(204);
    }
}
