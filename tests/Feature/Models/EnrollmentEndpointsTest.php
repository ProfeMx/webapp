<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class EnrollmentEndpointsTest extends TestCase
{

    public function test_enrollment_policies_endpoint()
    {

        $enrollment = \App\Models\Enrollment::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $enrollment->id
        ];

        $this->json('GET', '/api/enrollment/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_enrollment_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/enrollment/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_enrollment_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/enrollment/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_enrollment_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/enrollment/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_enrollment_show_auth_endpoint()
    {

        $enrollment = \App\Models\Enrollment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_id' => $enrollment->id
        ];

        $this->json('GET', '/api/enrollment/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_show_guest_endpoint()
    {

        $enrollment = \App\Models\Enrollment::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_id' => $enrollment->id
        ];

        $this->json('GET', '/api/enrollment/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_enrollment_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Enrollment::factory()->make()->getAttributes();

        $this->json('POST', '/api/enrollment/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_enrollment_update_endpoint()
    {

        $enrollment = \App\Models\Enrollment::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Enrollment::factory()->make()->getAttributes(),
            'enrollment_id' => $enrollment->id
        ];

        $this->json('PUT', '/api/enrollment/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_delete_endpoint()
    {

        $enrollment = \App\Models\Enrollment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_id' => $enrollment->id
        ];

        $this->json('DELETE', '/api/enrollment/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_restore_endpoint()
    {

        $enrollment = \App\Models\Enrollment::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_id' => $enrollment->id
        ];

        $this->json('POST', '/api/enrollment/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_force_delete_endpoint()
    {

        $enrollment = \App\Models\Enrollment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_id' => $enrollment->id
        ];

        $this->json('DELETE', '/api/enrollment/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_enrollment_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/enrollment/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
