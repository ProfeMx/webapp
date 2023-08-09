<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class UserEndpointsTest extends TestCase
{

    public function test_user_policies_endpoint()
    {

        $user = \App\Models\User::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $user->id
        ];

        $this->json('GET', '/api/user/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_user_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/user/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_user_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/user/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_user_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/user/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_user_show_auth_endpoint()
    {

        $user = \App\Models\User::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'user_id' => $user->id
        ];

        $this->json('GET', '/api/user/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_user_show_guest_endpoint()
    {

        $user = \App\Models\User::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'user_id' => $user->id
        ];

        $this->json('GET', '/api/user/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_user_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\User::factory()->make()->getAttributes();

        $this->json('POST', '/api/user/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_user_update_endpoint()
    {

        $user = \App\Models\User::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\User::factory()->make()->getAttributes(),
            'user_id' => $user->id
        ];

        $this->json('PUT', '/api/user/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_user_delete_endpoint()
    {

        $user = \App\Models\User::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'user_id' => $user->id
        ];

        $this->json('DELETE', '/api/user/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_user_restore_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'user_id' => $user->id
        ];

        $this->json('POST', '/api/user/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_user_force_delete_endpoint()
    {

        $user = \App\Models\User::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'user_id' => $user->id
        ];

        $this->json('DELETE', '/api/user/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_user_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/user/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
