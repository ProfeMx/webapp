<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CertificateEndpointsTest extends TestCase
{

    public function test_certificate_policies_endpoint()
    {

        $certificate = \App\Models\Certificate::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $certificate->id
        ];

        $this->json('GET', '/api/certificate/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_certificate_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/certificate/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_certificate_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/certificate/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_certificate_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/certificate/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_certificate_show_auth_endpoint()
    {

        $certificate = \App\Models\Certificate::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'certificate_id' => $certificate->id
        ];

        $this->json('GET', '/api/certificate/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_certificate_show_guest_endpoint()
    {

        $certificate = \App\Models\Certificate::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'certificate_id' => $certificate->id
        ];

        $this->json('GET', '/api/certificate/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_certificate_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Certificate::factory()->make()->getAttributes();

        $this->json('POST', '/api/certificate/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_certificate_update_endpoint()
    {

        $certificate = \App\Models\Certificate::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Certificate::factory()->make()->getAttributes(),
            'certificate_id' => $certificate->id
        ];

        $this->json('PUT', '/api/certificate/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_certificate_delete_endpoint()
    {

        $certificate = \App\Models\Certificate::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'certificate_id' => $certificate->id
        ];

        $this->json('DELETE', '/api/certificate/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_certificate_restore_endpoint()
    {

        $certificate = \App\Models\Certificate::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'certificate_id' => $certificate->id
        ];

        $this->json('POST', '/api/certificate/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_certificate_force_delete_endpoint()
    {

        $certificate = \App\Models\Certificate::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'certificate_id' => $certificate->id
        ];

        $this->json('DELETE', '/api/certificate/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_certificate_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/certificate/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
