<?php

namespace Tests\Feature;

use App\Models\Users_status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Users_statusSeeder;

class UsersStatusesTest extends TestCase
{
    public function testUsersStatusesIndex()
    {
        $response = $this->get('/api/usersstatuses');
        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    '*' => [
                         'id',
                         'user_status'
                    ]
                ]
            ]);
    }
    
    public function testUsersStatusesStore()

    {
        $response = $this->postJson('/api/usersstatuses', ['user_status' => 'В обработке']);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'user_status'
                ]
                ]);
    }

    public function testUsersStatusesShow()
    {
        $response = $this->get('/api/usersstatuses/'.Users_status::inRandomOrder()->first()->id);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'user_status'
                    ]
        ]);
    }

    public function testUsersStatusesUpdate()

    {
        $response = $this->put('/api/usersstatuses/'.Users_status::inRandomOrder()->first()->id, ['user_status' => 'Уехала']);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                     'id',
                     'user_status'
                ]
                ]);
    }

    public function testUsersStatusesDelete()
    {
        $response = $this->delete('/api/usersstatuses/'.Users_status::inRandomOrder()->first()->id);
        $response->assertStatus(204);
    }
}
