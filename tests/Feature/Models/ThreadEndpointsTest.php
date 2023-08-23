<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThreadEndpointsTest extends TestCase
{

    public function test_thread_policies_endpoint()
    {

        $thread = \App\Models\Thread::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $thread->id
        ];

        $this->json('GET', '/api/thread/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_thread_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/thread/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_thread_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/thread/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_thread_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/thread/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_thread_show_auth_endpoint()
    {

        $thread = \App\Models\Thread::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_id' => $thread->id
        ];

        $this->json('GET', '/api/thread/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_show_guest_endpoint()
    {

        $thread = \App\Models\Thread::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_id' => $thread->id
        ];

        $this->json('GET', '/api/thread/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_thread_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Thread::factory()->make()->getAttributes();

        $this->json('POST', '/api/thread/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_thread_update_endpoint()
    {

        $thread = \App\Models\Thread::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Thread::factory()->make()->getAttributes(),
            'thread_id' => $thread->id
        ];

        $this->json('PUT', '/api/thread/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_delete_endpoint()
    {

        $thread = \App\Models\Thread::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_id' => $thread->id
        ];

        $this->json('DELETE', '/api/thread/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_restore_endpoint()
    {

        $thread = \App\Models\Thread::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_id' => $thread->id
        ];

        $this->json('POST', '/api/thread/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_force_delete_endpoint()
    {

        $thread = \App\Models\Thread::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_id' => $thread->id
        ];

        $this->json('DELETE', '/api/thread/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_thread_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/thread/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
