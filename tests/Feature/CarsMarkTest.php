<?php

namespace Tests\Feature;

use App\Models\Cars_mark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Cars_markSeeder;

class CarsMarkTest extends TestCase
{

    public function testCarsMarkIndex()
    {
        // $this->seed(Cars_markSeeder::class);
        $response = $this->get('/api/carsmarks');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'car_mark'
                    ]
                ]
            ]);
    }
    
    public function testCarsMarkStore()

    {
        $this->seed(Cars_markSeeder::class);
        $response = $this->postJson('/api/carsmarks', ['car_mark' => 'Chevrolet']);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'car_mark'
                ]
                ]);
    }

    public function testCarsMarkShow()
    {
        $this->seed(Cars_markSeeder::class);
        $carmarkuuid = Cars_mark::inRandomOrder()->first()->id;
        $response = $this->get('/api/carsmarks/'.$carmarkuuid);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'car_mark'
                    ]
        ]);
    }

    public function testCarsMarkUpdate()

    {
        $this->seed(Cars_markSeeder::class);
        $carmarkuuid = Cars_mark::inRandomOrder()->first()->id;
        $response = $this->putJson('/api/carsmarks/'.$carmarkuuid, ['car_mark' => 'Mazda']);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'car_mark'
                ]
                ]);
    }

    public function testCarsMarkDelete()
    {
        $this->seed(Cars_markSeeder::class);
        $carmarkuuid = Cars_mark::inRandomOrder()->first()->id;
        $response = $this->delete('/api/carsmarks/'.$carmarkuuid);
        $response->assertStatus(204);
    }
}
