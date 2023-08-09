<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class EnrollmentLogEndpointsTest extends TestCase
{

    public function test_enrollment_log_policies_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $enrollmentLog->id
        ];

        $this->json('GET', '/api/enrollment-log/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_enrollment_log_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/enrollment-log/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_enrollment_log_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/enrollment-log/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_enrollment_log_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/enrollment-log/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_enrollment_log_show_auth_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_log_id' => $enrollmentLog->id
        ];

        $this->json('GET', '/api/enrollment-log/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_log_show_guest_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_log_id' => $enrollmentLog->id
        ];

        $this->json('GET', '/api/enrollment-log/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_enrollment_log_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\EnrollmentLog::factory()->make()->getAttributes();

        $this->json('POST', '/api/enrollment-log/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_enrollment_log_update_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\EnrollmentLog::factory()->make()->getAttributes(),
            'enrollment_log_id' => $enrollmentLog->id
        ];

        $this->json('PUT', '/api/enrollment-log/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_log_delete_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_log_id' => $enrollmentLog->id
        ];

        $this->json('DELETE', '/api/enrollment-log/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_log_restore_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_log_id' => $enrollmentLog->id
        ];

        $this->json('POST', '/api/enrollment-log/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_enrollment_log_force_delete_endpoint()
    {

        $enrollmentLog = \App\Models\EnrollmentLog::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'enrollment_log_id' => $enrollmentLog->id
        ];

        $this->json('DELETE', '/api/enrollment-log/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_enrollment_log_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/enrollment-log/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
