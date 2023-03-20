<?php

namespace Tests\Feature;

use App\Models\Cars_dvs_type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Cars_dvs_typesSeeder;

class CarsDvsTypesTest extends TestCase
{   

    public function testDvsTypeIndex()
    {
        $this->seed(Cars_dvs_typesSeeder::class);
        $response = $this->get('/api/dvstype');

        $response->assertStatus(200)
                 ->assertJsonStructure([
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
        $this->seed(Cars_dvs_typesSeeder::class);
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
        $this->seed(Cars_dvs_typesSeeder::class);
        $dvstypeuuid = Cars_dvs_type::inRandomOrder()->first()->id;
        $response = $this->get('/api/dvstype/'.$dvstypeuuid);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'dvs_type'
                    ]
        ]);
    }

    public function testDvsTypeUpdate()

    {
        $this->seed(Cars_dvs_typesSeeder::class);
        $dvstypeuuid = Cars_dvs_type::inRandomOrder()->first()->id;
        $response = $this->putJson('/api/dvstype/'.$dvstypeuuid, ['dvs_type' => 'Кислородный']);
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
        $this->seed(Cars_dvs_typesSeeder::class);
        $dvstypeuuid = Cars_dvs_type::inRandomOrder()->first()->id;
        $response = $this->delete('/api/dvstype/'.$dvstypeuuid);
        $response->assertStatus(204);
    }
}
