<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerEndpointsTest extends TestCase
{

    public function test_answer_policies_endpoint()
    {

        $answer = \App\Models\Answer::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $answer->id
        ];

        $this->json('GET', '/api/answer/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_answer_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/answer/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_answer_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/answer/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_answer_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/answer/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_answer_show_auth_endpoint()
    {

        $answer = \App\Models\Answer::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'answer_id' => $answer->id
        ];

        $this->json('GET', '/api/answer/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_answer_show_guest_endpoint()
    {

        $answer = \App\Models\Answer::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'answer_id' => $answer->id
        ];

        $this->json('GET', '/api/answer/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_answer_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Answer::factory()->make()->getAttributes();

        $this->json('POST', '/api/answer/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_answer_update_endpoint()
    {

        $answer = \App\Models\Answer::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Answer::factory()->make()->getAttributes(),
            'answer_id' => $answer->id
        ];

        $this->json('PUT', '/api/answer/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_answer_delete_endpoint()
    {

        $answer = \App\Models\Answer::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'answer_id' => $answer->id
        ];

        $this->json('DELETE', '/api/answer/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_answer_restore_endpoint()
    {

        $answer = \App\Models\Answer::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'answer_id' => $answer->id
        ];

        $this->json('POST', '/api/answer/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_answer_force_delete_endpoint()
    {

        $answer = \App\Models\Answer::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'answer_id' => $answer->id
        ];

        $this->json('DELETE', '/api/answer/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_answer_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/answer/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
