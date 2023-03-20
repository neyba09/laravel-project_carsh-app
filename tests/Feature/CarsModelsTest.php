<?php

namespace Tests\Feature;

use App\Models\Cars_models;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Cars_modelsSeeder;
use Database\Seeders\Cars_markSeeder;
use App\Models\Cars_mark;


class CarsModelsTest extends TestCase
{

    public function testCarsModelsIndex()
    {
        $response = $this->get('/api/carsmodels');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'car_model',
                         'cars_mark_id'
                    ]
                ]
            ]);
    }
    
    public function testCarsModelsStore()

    {
        $response = $this->postJson('/api/carsmodels', 
            [
                'car_model' => 'A4',
                'cars_mark_id' => Cars_mark::inRandomOrder()->first()->id
            ]
        );
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'car_model',
                    'cars_mark_id'
                ]
            ]);
    }

    public function testCarsModelsShow()
    {
        $carsmodelsuuid = Cars_models::inRandomOrder()->first()->id;
        $response = $this->get('/api/carsmodels/'.$carsmodelsuuid);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'car_model',
                        'cars_mark_id'
                    ]
        ]);
    }

    public function testCarsModelsUpdate()

    {
        $carsmodelsuuid = Cars_models::inRandomOrder()->first()->id;
        $response = $this->put('/api/carsmodels/'.$carsmodelsuuid, 
            [
                'car_model' => 'A6',
                'cars_mark_id' => Cars_mark::inRandomOrder()->first()->id
            ]);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'car_model',
                    'cars_mark_id'
                ]
            ]);
    }

    public function testCarsModelsDelete()
    {
        $carsmodelsuuid = Cars_models::inRandomOrder()->first()->id;
        $response = $this->delete('/api/carsmodels/'.$carsmodelsuuid);
        $response->assertStatus(204);
    }
}
