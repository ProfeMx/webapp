<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeworkEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_homework_policies_endpoint()
    {

        $homework = \App\Models\Homework::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $homework->id
        ];

        $this->json('GET', '/api/homework/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_homework_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/homework/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_homework_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/homework/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_homework_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/homework/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_homework_show_auth_endpoint()
    {

        $homework = \App\Models\Homework::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'homework_id' => $homework->id
        ];

        $this->json('GET', '/api/homework/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_homework_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $homework = \App\Models\Homework::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'homework_id' => $homework->id
        ];

        $this->json('GET', '/api/homework/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_homework_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Homework::factory()->make()->getAttributes();

        $this->json('POST', '/api/homework/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_homework_update_endpoint()
    {

        $homework = \App\Models\Homework::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Homework::factory()->make()->getAttributes(),
            'homework_id' => $homework->id
        ];

        $this->json('PUT', '/api/homework/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_homework_delete_endpoint()
    {

        $homework = \App\Models\Homework::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'homework_id' => $homework->id
        ];

        $this->json('DELETE', '/api/homework/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_homework_restore_endpoint()
    {

        $homework = \App\Models\Homework::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'homework_id' => $homework->id
        ];

        $this->json('POST', '/api/homework/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_homework_force_delete_endpoint()
    {

        $homework = \App\Models\Homework::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'homework_id' => $homework->id
        ];

        $this->json('DELETE', '/api/homework/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    /*

    public function test_homework_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/homework/export', $payload, $headers)
            ->assertStatus(200);
            
    }

    */

}
