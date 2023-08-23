<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CareerEndpointsTest extends TestCase
{

    public function test_career_policies_endpoint()
    {

        $career = \App\Models\Career::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $career->id
        ];

        $this->json('GET', '/api/career/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_career_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/career/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_career_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/career/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_career_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/career/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_career_show_auth_endpoint()
    {

        $career = \App\Models\Career::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'career_id' => $career->id
        ];

        $this->json('GET', '/api/career/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_career_show_guest_endpoint()
    {

        $career = \App\Models\Career::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'career_id' => $career->id
        ];

        $this->json('GET', '/api/career/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_career_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Career::factory()->make()->getAttributes();

        $this->json('POST', '/api/career/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_career_update_endpoint()
    {

        $career = \App\Models\Career::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Career::factory()->make()->getAttributes(),
            'career_id' => $career->id
        ];

        $this->json('PUT', '/api/career/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_career_delete_endpoint()
    {

        $career = \App\Models\Career::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'career_id' => $career->id
        ];

        $this->json('DELETE', '/api/career/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_career_restore_endpoint()
    {

        $career = \App\Models\Career::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'career_id' => $career->id
        ];

        $this->json('POST', '/api/career/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_career_force_delete_endpoint()
    {

        $career = \App\Models\Career::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'career_id' => $career->id
        ];

        $this->json('DELETE', '/api/career/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_career_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/career/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
