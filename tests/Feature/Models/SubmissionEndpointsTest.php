<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class SubmissionEndpointsTest extends TestCase
{

    public function test_submission_policies_endpoint()
    {

        $submission = \App\Models\Submission::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $submission->id
        ];

        $this->json('GET', '/api/submission/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_submission_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/submission/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_submission_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/submission/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_submission_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/submission/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_submission_show_auth_endpoint()
    {

        $submission = \App\Models\Submission::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'submission_id' => $submission->id
        ];

        $this->json('GET', '/api/submission/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_submission_show_guest_endpoint()
    {

        $submission = \App\Models\Submission::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'submission_id' => $submission->id
        ];

        $this->json('GET', '/api/submission/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_submission_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Submission::factory()->make()->getAttributes();

        $this->json('POST', '/api/submission/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_submission_update_endpoint()
    {

        $submission = \App\Models\Submission::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Submission::factory()->make()->getAttributes(),
            'submission_id' => $submission->id
        ];

        $this->json('PUT', '/api/submission/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_submission_delete_endpoint()
    {

        $submission = \App\Models\Submission::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'submission_id' => $submission->id
        ];

        $this->json('DELETE', '/api/submission/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_submission_restore_endpoint()
    {

        $submission = \App\Models\Submission::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'submission_id' => $submission->id
        ];

        $this->json('POST', '/api/submission/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_submission_force_delete_endpoint()
    {

        $submission = \App\Models\Submission::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'submission_id' => $submission->id
        ];

        $this->json('DELETE', '/api/submission/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_submission_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/submission/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
