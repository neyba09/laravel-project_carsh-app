<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    // public function testUsersIndex()
    // {
    //     $response = $this->get('/api/users');

    //     $response->assertStatus(200);

    //     $response->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                      'id',
    //                      'last_name',
    //                      'first_name',
    //                      'middle_name',
    //                      'phone_number',
    //                      'passport_series',
    //                      'passport_num'
    //                 ]
    //             ]
    //         ]);
    // }
    
    // public function testUsersStore()

    // {
    //     $response = $this->postJson('/api/users', 
    //         [
    //             'last_name'=>'Велесова',
    //             'first_name'=>'Валентина',
    //             'middle_name'=>'Владимировна',
    //             'phone_number'=>'8912431212',
    //             'passport_series'=>'5678',
    //             'passport_num'=>'451212',
    //             'users_status_id'=>'2'
    //         ]);
    //     $response
    //         ->assertStatus(201)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'last_name',
    //                 'first_name',
    //                 'middle_name',
    //                 'phone_number',
    //                 'passport_series',
    //                 'passport_num'
    //             ]
    //             ]);
    // }

    // public function testUsersShow()
    // {
    //     $response = $this->get('/api/users/10');
    //     $response->assertStatus(200)
    //             ->assertJsonPath('data.last_name', 'Баранов')
    //             ->assertJsonStructure([
    //                 'data' => [
    //                     'id',
    //                     'last_name',
    //                     'first_name',
    //                     'middle_name',
    //                     'phone_number',
    //                     'passport_series',
    //                     'passport_num'
    //                 ]
    //     ]);
    // }

    // public function testUsersUpdate()

    // {
    //     $response = $this->put('/api/users/11', 
    //     [
    //         'last_name'=>'Велесова',
    //         'first_name'=>'Валентина',
    //         'middle_name'=>'Владимировна',
    //         'phone_number'=>'8912431212',
    //         'passport_series'=>'5678',
    //         'passport_num'=>'451212',
    //         'users_status_id'=>'2'
    //     ]);
    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 'id',
    //                 'last_name',
    //                 'first_name',
    //                 'middle_name',
    //                 'phone_number',
    //                 'passport_series',
    //                 'passport_num'
    //             ]
    //             ]);
    // }

    // public function testUsersDelete()
    // {
    //     $response = $this->delete('/api/users/4');
    //     $response->assertStatus(204);
    // }
}
