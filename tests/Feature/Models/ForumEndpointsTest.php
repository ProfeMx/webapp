<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForumEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_forum_policies_endpoint()
    {

        $forum = \App\Models\Forum::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $forum->id
        ];

        $this->json('GET', '/api/forum/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_forum_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/forum/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_forum_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/forum/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_forum_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/forum/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_forum_show_auth_endpoint()
    {

        $forum = \App\Models\Forum::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_id' => $forum->id
        ];

        $this->json('GET', '/api/forum/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $forum = \App\Models\Forum::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_id' => $forum->id
        ];

        $this->json('GET', '/api/forum/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_forum_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Forum::factory()->make()->getAttributes();

        $this->json('POST', '/api/forum/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_forum_update_endpoint()
    {

        $forum = \App\Models\Forum::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Forum::factory()->make()->getAttributes(),
            'forum_id' => $forum->id
        ];

        $this->json('PUT', '/api/forum/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_delete_endpoint()
    {

        $forum = \App\Models\Forum::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_id' => $forum->id
        ];

        $this->json('DELETE', '/api/forum/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_restore_endpoint()
    {

        $forum = \App\Models\Forum::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_id' => $forum->id
        ];

        $this->json('POST', '/api/forum/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_force_delete_endpoint()
    {

        $forum = \App\Models\Forum::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_id' => $forum->id
        ];

        $this->json('DELETE', '/api/forum/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    /*

    public function test_forum_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/forum/export', $payload, $headers)
            ->assertStatus(200);
            
    }

    */

}
