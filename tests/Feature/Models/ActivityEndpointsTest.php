<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_activity_policies_endpoint()
    {

        $activity = \App\Models\Activity::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $activity->id
        ];

        $this->json('GET', '/api/activity/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_activity_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/activity/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_activity_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/activity/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_activity_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/activity/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_activity_show_auth_endpoint()
    {

        $activity = \App\Models\Activity::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'activity_id' => $activity->id
        ];

        $this->json('GET', '/api/activity/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_activity_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $activity = \App\Models\Activity::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'activity_id' => $activity->id
        ];

        $this->json('GET', '/api/activity/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_activity_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Activity::factory()->make()->getAttributes();

        $this->json('POST', '/api/activity/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_activity_update_endpoint()
    {

        $activity = \App\Models\Activity::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Activity::factory()->make()->getAttributes(),
            'activity_id' => $activity->id
        ];

        $this->json('PUT', '/api/activity/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_activity_delete_endpoint()
    {

        $activity = \App\Models\Activity::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'activity_id' => $activity->id
        ];

        $this->json('DELETE', '/api/activity/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_activity_restore_endpoint()
    {

        $activity = \App\Models\Activity::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'activity_id' => $activity->id
        ];

        $this->json('POST', '/api/activity/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_activity_force_delete_endpoint()
    {

        $activity = \App\Models\Activity::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'activity_id' => $activity->id
        ];

        $this->json('DELETE', '/api/activity/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    /*

    public function test_activity_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/activity/export', $payload, $headers)
            ->assertStatus(200);
            
    }
    */

}
