<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\CarsstatusesSeeder;

class CarsStatusesTest extends TestCase
{
    // use RefreshDatabase;

    // public function testCarsStatusesSeederCreated()
    // {
    //     $this->seed(CarsstatusesSeeder::class);
    // }

    // public function testCarsStatusesIndex()
    // {
    //     $response = $this->get('/api/carsstatuses');

    //     $response->assertStatus(200);

    //     $response->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                      'id',
    //                      'car_status'
    //                 ]
    //             ]
    //         ]);
    // }
    
    // public function testCarsStatusesStore()

    // {
    //     $response = $this->postJson('/api/carsstatuses', ['car_status' => 'Sally']);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                  'id',
    //                  'car_status'
    //             ]
    //             ]);
    // }

    // public function testCarsStatusesShow()
    // {
    //     $response = $this->get('/api/carsstatuses/12');
    //     $response->assertStatus(200)
    //             ->assertJsonPath('data.car_status', 'Уехала')
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'car_status'
    //                 ]
    //     ]);
    // }

    // public function testCarsStatusesUpdate()

    // {
    //     $response = $this->put('/api/carsstatuses/12', ['car_status' => 'Уехала']);
    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                  'id',
    //                  'car_status'
    //             ]
    //             ]);
    // }

    // public function testCarsStatusesDelete()
    // {
    //     $response = $this->delete('/api/carsstatuses/17');
    //     $response->assertStatus(204);
    // }
}
