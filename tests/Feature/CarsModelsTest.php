<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarsModelsTest extends TestCase
{
    // public function testCarsModelsIndex()
    // {
    //     $response = $this->get('/api/carsmodels');

    //     $response->assertStatus(200);

    //     $response->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                      'id',
    //                      'car_model',
    //                      'cars_mark_id'
    //                 ]
    //             ]
    //         ]);
    // }
    
    // public function testCarsModelsStore()

    // {
    //     $response = $this->postJson('/api/carsmodels', 
    //         [
    //             'car_model' => 'A4',
    //             'cars_mark_id' => 2
    //         ]
    //     );
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'car_model',
    //                 'cars_mark_id'
    //             ]
    //         ]);
    // }

    // public function testCarsModelsShow()
    // {
    //     $response = $this->get('/api/carsmodels/1');
    //     $response->assertStatus(200)
    //             ->assertJsonPath('data.car_model', 'Nexia')
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'car_model',
    //                     'cars_mark_id'
    //                 ]
    //     ]);
    // }

    // public function testCarsModelsUpdate()

    // {
    //     $response = $this->put('/api/carsmodels/6', 
    //         [
    //             'car_model' => 'A6',
    //             'cars_mark_id' => 4
    //         ]);
    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'car_model',
    //                 'cars_mark_id'
    //             ]
    //         ]);
    // }

    // public function testCarsModelsDelete()
    // {
    //     $response = $this->delete('/api/carsmodels/11');
    //     $response->assertStatus(204);
    // }
}
