<?php

namespace Tests\Feature;

use App\Models\Cars_status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\CarsstatusesSeeder;

class CarsStatusesTest extends TestCase
{
   public function testCarsStatusesIndex()
    {
        $response = $this->get('/api/carsstatuses');

        $response->assertStatus(200);

        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'car_status'
                    ]
                ]
            ]);
    }
    
    public function testCarsStatusesStore()

    {
        $response = $this->postJson('/api/carsstatuses', ['car_status' => 'Исчез']);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'car_status'
                ]
                ]);
    }

    public function testCarsStatusesShow()
    {
        $response = $this->get('/api/carsstatuses/'.Cars_status::inRandomOrder()->first()->id);
        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'data' => [
                        'id',
                        'car_status'
                    ]
        ]);
    }

    public function testCarsStatusesUpdate()

    {
        $response = $this->put('/api/carsstatuses/'.Cars_status::inRandomOrder()->first()->id, ['car_status' => 'Уехала']);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'car_status'
                ]
                ]);
    }

    public function testCarsStatusesDelete()
    {
        $response = $this->delete('/api/carsstatuses/'.Cars_status::inRandomOrder()->first()->id);
        $response->assertStatus(204);
    }
}
