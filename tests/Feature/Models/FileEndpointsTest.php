<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FileEndpointsTest extends TestCase
{

    public function test_file_policies_endpoint()
    {

        $file = \App\Models\File::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $file->id
        ];

        $this->json('GET', '/api/file/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_file_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/file/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_file_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/file/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_file_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/file/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_file_show_auth_endpoint()
    {

        $file = \App\Models\File::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'file_id' => $file->id
        ];

        $this->json('GET', '/api/file/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_file_show_guest_endpoint()
    {

        $file = \App\Models\File::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'file_id' => $file->id
        ];

        $this->json('GET', '/api/file/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_file_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\File::factory()->make()->getAttributes();

        $this->json('POST', '/api/file/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_file_update_endpoint()
    {

        $file = \App\Models\File::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\File::factory()->make()->getAttributes(),
            'file_id' => $file->id
        ];

        $this->json('PUT', '/api/file/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_file_delete_endpoint()
    {

        $file = \App\Models\File::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'file_id' => $file->id
        ];

        $this->json('DELETE', '/api/file/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_file_restore_endpoint()
    {

        $file = \App\Models\File::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'file_id' => $file->id
        ];

        $this->json('POST', '/api/file/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_file_force_delete_endpoint()
    {

        $file = \App\Models\File::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'file_id' => $file->id
        ];

        $this->json('DELETE', '/api/file/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_file_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/file/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
