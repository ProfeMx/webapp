<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class PathEndpointsTest extends TestCase
{

    public function test_path_policies_endpoint()
    {

        $path = \App\Models\Path::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $path->id
        ];

        $this->json('GET', '/api/path/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_path_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/path/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_path_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/path/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_path_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/path/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_path_show_auth_endpoint()
    {

        $path = \App\Models\Path::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'path_id' => $path->id
        ];

        $this->json('GET', '/api/path/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_path_show_guest_endpoint()
    {

        $path = \App\Models\Path::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'path_id' => $path->id
        ];

        $this->json('GET', '/api/path/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_path_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Path::factory()->make()->getAttributes();

        $this->json('POST', '/api/path/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_path_update_endpoint()
    {

        $path = \App\Models\Path::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Path::factory()->make()->getAttributes(),
            'path_id' => $path->id
        ];

        $this->json('PUT', '/api/path/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_path_delete_endpoint()
    {

        $path = \App\Models\Path::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'path_id' => $path->id
        ];

        $this->json('DELETE', '/api/path/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_path_restore_endpoint()
    {

        $path = \App\Models\Path::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'path_id' => $path->id
        ];

        $this->json('POST', '/api/path/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_path_force_delete_endpoint()
    {

        $path = \App\Models\Path::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'path_id' => $path->id
        ];

        $this->json('DELETE', '/api/path/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_path_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/path/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
