<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class ForumSubscriptionEndpointsTest extends TestCase
{

    public function test_forum_subscription_policies_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $forumSubscription->id
        ];

        $this->json('GET', '/api/forum-subscription/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_forum_subscription_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/forum-subscription/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_forum_subscription_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/forum-subscription/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_forum_subscription_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/forum-subscription/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_forum_subscription_show_auth_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('GET', '/api/forum-subscription/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_show_guest_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('GET', '/api/forum-subscription/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_forum_subscription_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\ForumSubscription::factory()->make()->getAttributes();

        $this->json('POST', '/api/forum-subscription/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_forum_subscription_update_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\ForumSubscription::factory()->make()->getAttributes(),
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('PUT', '/api/forum-subscription/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_delete_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('DELETE', '/api/forum-subscription/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_restore_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('POST', '/api/forum-subscription/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_force_delete_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('DELETE', '/api/forum-subscription/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_forum_subscription_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/forum-subscription/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
