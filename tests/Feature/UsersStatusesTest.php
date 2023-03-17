<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\Users_statusSeeder;

class UsersStatusesTest extends TestCase
{
    // use RefreshDatabase;

    // public function testUsersStatusesSeederCreated()
    // {
    //     $this->seed(Users_statusSeeder::class);
    // }
    // public function testUsersStatusesIndex()
    // {
    //     $response = $this->get('/api/usersstatuses');

    //     $response->assertStatus(200);

    //     $response->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                      'id',
    //                      'user_status'
    //                 ]
    //             ]
    //         ]);
    // }
    
    // public function testUsersStatusesStore()

    // {
    //     $response = $this->postJson('/api/usersstatuses', ['user_status' => 'Sally']);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                  'id',
    //                  'user_status'
    //             ]
    //             ]);
    // }

    // public function testUsersStatusesShow()
    // {
    //     $response = $this->get('/api/usersstatuses/2');
    //     $response->assertStatus(200)
    //             ->assertJsonPath('data.user_status', 'Неактивный')
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'user_status'
    //                 ]
    //     ]);
    // }

    // public function testUsersStatusesUpdate()

    // {
    //     $response = $this->put('/api/usersstatuses/16', ['user_status' => 'Уехала']);
    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                  'id',
    //                  'user_status'
    //             ]
    //             ]);
    // }

    // public function testUsersStatusesDelete()
    // {
    //     $response = $this->delete('/api/usersstatuses/16');
    //     $response->assertStatus(204);
    // }
}
