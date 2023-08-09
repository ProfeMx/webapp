<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class AttemptEndpointsTest extends TestCase
{

    public function test_attempt_policies_endpoint()
    {

        $attempt = \App\Models\Attempt::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $attempt->id
        ];

        $this->json('GET', '/api/attempt/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_attempt_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/attempt/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_attempt_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/attempt/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_attempt_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/attempt/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_attempt_show_auth_endpoint()
    {

        $attempt = \App\Models\Attempt::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'attempt_id' => $attempt->id
        ];

        $this->json('GET', '/api/attempt/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_attempt_show_guest_endpoint()
    {

        $attempt = \App\Models\Attempt::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'attempt_id' => $attempt->id
        ];

        $this->json('GET', '/api/attempt/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_attempt_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Attempt::factory()->make()->getAttributes();

        $this->json('POST', '/api/attempt/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_attempt_update_endpoint()
    {

        $attempt = \App\Models\Attempt::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Attempt::factory()->make()->getAttributes(),
            'attempt_id' => $attempt->id
        ];

        $this->json('PUT', '/api/attempt/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_attempt_delete_endpoint()
    {

        $attempt = \App\Models\Attempt::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'attempt_id' => $attempt->id
        ];

        $this->json('DELETE', '/api/attempt/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_attempt_restore_endpoint()
    {

        $attempt = \App\Models\Attempt::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'attempt_id' => $attempt->id
        ];

        $this->json('POST', '/api/attempt/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_attempt_force_delete_endpoint()
    {

        $attempt = \App\Models\Attempt::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'attempt_id' => $attempt->id
        ];

        $this->json('DELETE', '/api/attempt/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_attempt_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/attempt/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
