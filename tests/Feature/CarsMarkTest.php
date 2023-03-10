<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarsMarkTest extends TestCase
{
    // public function testCarsMarkIndex()
    // {
    //     $response = $this->get('/api/carsmarks');

    //     $response->assertStatus(200);

    //     $response->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                      'id',
    //                      'car_mark'
    //                 ]
    //             ]
    //         ]);
    // }
    
    // public function testCarsMarkStore()

    // {
    //     $response = $this->postJson('/api/carsmarks', ['car_mark' => 'Chevrolet']);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                  'id',
    //                  'car_mark'
    //             ]
    //             ]);
    // }

    // public function testCarsMarkShow()
    // {
    //     $response = $this->get('/api/carsmarks/6');
    //     $response->assertStatus(200)
    //             ->assertJsonPath('data.car_mark', 'test')
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'car_mark'
    //                 ]
    //     ]);
    // }

    // public function testCarsMarkUpdate()

    // {
    //     $response = $this->put('/api/carsmarks/7', ['car_mark' => 'Mazda']);
    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                  'id',
    //                  'car_mark'
    //             ]
    //             ]);
    // }

    // public function testCarsMarkDelete()
    // {
    //     $response = $this->delete('/api/carsmarks/10');
    //     $response->assertStatus(204);
    // }
}
