<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class SectionEndpointsTest extends TestCase
{

    public function test_section_policies_endpoint()
    {

        $section = \App\Models\Section::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $section->id
        ];

        $this->json('GET', '/api/section/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_section_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/section/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_section_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/section/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_section_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/section/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_section_show_auth_endpoint()
    {

        $section = \App\Models\Section::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'section_id' => $section->id
        ];

        $this->json('GET', '/api/section/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_section_show_guest_endpoint()
    {

        $section = \App\Models\Section::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'section_id' => $section->id
        ];

        $this->json('GET', '/api/section/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_section_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Section::factory()->make()->getAttributes();

        $this->json('POST', '/api/section/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_section_update_endpoint()
    {

        $section = \App\Models\Section::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Section::factory()->make()->getAttributes(),
            'section_id' => $section->id
        ];

        $this->json('PUT', '/api/section/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_section_delete_endpoint()
    {

        $section = \App\Models\Section::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'section_id' => $section->id
        ];

        $this->json('DELETE', '/api/section/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_section_restore_endpoint()
    {

        $section = \App\Models\Section::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'section_id' => $section->id
        ];

        $this->json('POST', '/api/section/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_section_force_delete_endpoint()
    {

        $section = \App\Models\Section::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'section_id' => $section->id
        ];

        $this->json('DELETE', '/api/section/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_section_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/section/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
