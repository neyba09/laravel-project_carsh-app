<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Cars_dvs_typesSeeder;

class CarsDvsTypesTest extends TestCase
{
    use RefreshDatabase;
    
    public function testDvsTypesSeederCreated()
    {
        $this->seed(Cars_dvs_typesSeeder::class);
    }

    public function testDvsTypeIndex()
    {
        $response = $this->get('/api/dvstype');

        $response->assertStatus(200);

        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'dvs_type'
                    ]
                ]
            ]);
    }
    
    public function testDvsTypeStore()

    {
        $response = $this->postJson('/api/dvstype', ['dvs_type' => 'Кислородный']);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'dvs_type'
                ]
            ]);
    }

    public function testDvsTypeShow()
    {
        $response = $this->get('/api/dvstype/1');
        $response->assertStatus(200)
                ->assertJsonPath('data.dvs_type', 'ГАЗ')
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'dvs_type'
                    ]
        ]);
    }

    public function testDvsTypeUpdate()

    {
        $response = $this->put('/api/dvstype/1', ['dvs_type' => 'Кислородный']);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'dvs_type'
                ]
                ]);
    }

    public function testDvsTypeDelete()
    {
        $response = $this->delete('/api/dvstype/1');
        $response->assertStatus(204);
    }
}
