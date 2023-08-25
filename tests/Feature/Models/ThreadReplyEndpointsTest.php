<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThreadReplyEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_thread_reply_policies_endpoint()
    {

        $threadReply = \App\Models\ThreadReply::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $threadReply->id
        ];

        $this->json('GET', '/api/thread_reply/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_thread_reply_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/thread_reply/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_thread_reply_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/thread_reply/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_thread_reply_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/thread_reply/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_thread_reply_show_auth_endpoint()
    {

        $threadReply = \App\Models\ThreadReply::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_reply_id' => $threadReply->id
        ];

        $this->json('GET', '/api/thread_reply/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_reply_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $threadReply = \App\Models\ThreadReply::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_reply_id' => $threadReply->id
        ];

        $this->json('GET', '/api/thread_reply/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_thread_reply_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\ThreadReply::factory()->make()->getAttributes();

        $this->json('POST', '/api/thread_reply/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_thread_reply_update_endpoint()
    {

        $threadReply = \App\Models\ThreadReply::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\ThreadReply::factory()->make()->getAttributes(),
            'thread_reply_id' => $threadReply->id
        ];

        $this->json('PUT', '/api/thread_reply/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_reply_delete_endpoint()
    {

        $threadReply = \App\Models\ThreadReply::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_reply_id' => $threadReply->id
        ];

        $this->json('DELETE', '/api/thread_reply/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_reply_restore_endpoint()
    {

        $threadReply = \App\Models\ThreadReply::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_reply_id' => $threadReply->id
        ];

        $this->json('POST', '/api/thread_reply/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_thread_reply_force_delete_endpoint()
    {

        $threadReply = \App\Models\ThreadReply::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'thread_reply_id' => $threadReply->id
        ];

        $this->json('DELETE', '/api/thread_reply/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    /*

    public function test_thread_reply_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/thread_reply/export', $payload, $headers)
            ->assertStatus(200);
            
    }

    */

}
