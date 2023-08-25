<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForumSubscriptionEndpointsTest extends TestCase
{


    use RefreshDatabase,
        WithFaker;

    public function test_forum_subscription_policies_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $forumSubscription->id
        ];

        $this->json('GET', '/api/forum_subscription/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_forum_subscription_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/forum_subscription/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_forum_subscription_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/forum_subscription/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_forum_subscription_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/forum_subscription/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_forum_subscription_show_auth_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('GET', '/api/forum_subscription/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('GET', '/api/forum_subscription/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_forum_subscription_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\ForumSubscription::factory()->make()->getAttributes();

        $this->json('POST', '/api/forum_subscription/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_forum_subscription_update_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\ForumSubscription::factory()->make()->getAttributes(),
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('PUT', '/api/forum_subscription/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_delete_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('DELETE', '/api/forum_subscription/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_restore_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('POST', '/api/forum_subscription/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_forum_subscription_force_delete_endpoint()
    {

        $forumSubscription = \App\Models\ForumSubscription::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'forum_subscription_id' => $forumSubscription->id
        ];

        $this->json('DELETE', '/api/forum_subscription/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    /*

    public function test_forum_subscription_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/forum_subscription/export', $payload, $headers)
            ->assertStatus(200);
            
    }
    */

}
