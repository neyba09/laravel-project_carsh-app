<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
    
    // public function testCarsOperationsStore()

    // {
    //     $response = $this->postJson('/api/carsoperations', 
    //         [
    //             'cars_id'=>24,
    //             'users_id'=>5,
    //             'cars_status_id'=>2,
    //             'data_time_operation'=>now(),
    //             'GPS_cars_latitude'=>42462.35008,
    //             'GPS_cars_longitude'=>42462.35008
    //         ]);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'cars_id',
    //                 'users_id',
    //                 'cars_status_id',
    //                 'data_time_operation',
    //                 'GPS_cars_latitude',
    //                 'GPS_cars_longitude'
    //             ]
    //             ]);
    // }

    public function testCarsOperationsShow()
    {
        $response = $this->get('/api/carsoperations/1');
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
        $response = $this->put('/api/carsoperations/1', 
        [
                'cars_id'=>24,
                'users_id'=>5,
                'cars_status_id'=>2,
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
        $response = $this->delete('/api/carsoperations/2');
        $response->assertStatus(204);
    }
}
