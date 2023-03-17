<?php

namespace Tests\Feature;

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

    // public function testCarsIndex()
    // {
    //     $response = $this->get('/api/cars');

    //     $response->assertStatus(200);

    //     $response->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                     'id',
    //                     'cars_models_id',
    //                     'car_number',
    //                     'car_year',
    //                     'cars_dvs_type_id',
    //                     'cars_status_id'
    //                 ]
    //             ]
    //         ]);
    // }
    
    // public function testCarsStore()

    // {
    //     $response = $this->postJson('/api/cars', 
    //             [
    //                 'cars_models_id'=>2,
    //                 'car_number'=> 'j707em',
    //                 'car_year'=>2021,
    //                 'cars_dvs_type_id'=>1,
    //                 'cars_status_id'=>17
    //             ]);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'cars_models_id',
    //                 'car_number',
    //                 'car_year',
    //                 'cars_dvs_type_id',
    //                 'cars_status_id'
    //             ]
    //         ]);
    // }

    // public function testCarsShow()
    // {
    //     $response = $this->get('/api/cars/24');
    //     $response->assertStatus(200)
    //             ->assertJsonPath('data.car_number', 'h820qs')
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'cars_models_id',
    //                     'car_number',
    //                     'car_year',
    //                     'cars_dvs_type_id',
    //                     'cars_status_id'
    //                 ]
    //     ]);
    // }

    // public function testCarsUpdate()

    // {
    //     $response = $this->put('/api/cars/22', 
    //         [
    //             'cars_models_id'=>5,
    //             'car_number'=> 'p707vb',
    //             'car_year'=>2014,
    //             'cars_dvs_type_id'=>2,
    //             'cars_status_id'=>4
    //         ]
    //     );
    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'cars_models_id',
    //                 'car_number',
    //                 'car_year',
    //                 'cars_dvs_type_id',
    //                 'cars_status_id'
    //             ]
    //         ]);
    // }

    // public function testCarsDelete()
    // {
    //     $response = $this->delete('/api/cars/22');
    //     $response->assertStatus(204);
    // }
}
