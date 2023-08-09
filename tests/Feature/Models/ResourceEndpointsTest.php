<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class ResourceEndpointsTest extends TestCase
{

    public function test_resource_policies_endpoint()
    {

        $resource = \App\Models\Resource::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $resource->id
        ];

        $this->json('GET', '/api/resource/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_resource_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/resource/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_resource_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/resource/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_resource_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/resource/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_resource_show_auth_endpoint()
    {

        $resource = \App\Models\Resource::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'resource_id' => $resource->id
        ];

        $this->json('GET', '/api/resource/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_resource_show_guest_endpoint()
    {

        $resource = \App\Models\Resource::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'resource_id' => $resource->id
        ];

        $this->json('GET', '/api/resource/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_resource_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Resource::factory()->make()->getAttributes();

        $this->json('POST', '/api/resource/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_resource_update_endpoint()
    {

        $resource = \App\Models\Resource::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Resource::factory()->make()->getAttributes(),
            'resource_id' => $resource->id
        ];

        $this->json('PUT', '/api/resource/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_resource_delete_endpoint()
    {

        $resource = \App\Models\Resource::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'resource_id' => $resource->id
        ];

        $this->json('DELETE', '/api/resource/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_resource_restore_endpoint()
    {

        $resource = \App\Models\Resource::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'resource_id' => $resource->id
        ];

        $this->json('POST', '/api/resource/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_resource_force_delete_endpoint()
    {

        $resource = \App\Models\Resource::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'resource_id' => $resource->id
        ];

        $this->json('DELETE', '/api/resource/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_resource_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/resource/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
