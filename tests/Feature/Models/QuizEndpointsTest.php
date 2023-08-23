<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuizEndpointsTest extends TestCase
{

    public function test_quiz_policies_endpoint()
    {

        $quiz = \App\Models\Quiz::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $quiz->id
        ];

        $this->json('GET', '/api/quiz/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_quiz_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/quiz/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_quiz_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/quiz/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_quiz_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/quiz/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_quiz_show_auth_endpoint()
    {

        $quiz = \App\Models\Quiz::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'quiz_id' => $quiz->id
        ];

        $this->json('GET', '/api/quiz/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_quiz_show_guest_endpoint()
    {

        $quiz = \App\Models\Quiz::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'quiz_id' => $quiz->id
        ];

        $this->json('GET', '/api/quiz/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_quiz_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Quiz::factory()->make()->getAttributes();

        $this->json('POST', '/api/quiz/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_quiz_update_endpoint()
    {

        $quiz = \App\Models\Quiz::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Quiz::factory()->make()->getAttributes(),
            'quiz_id' => $quiz->id
        ];

        $this->json('PUT', '/api/quiz/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_quiz_delete_endpoint()
    {

        $quiz = \App\Models\Quiz::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'quiz_id' => $quiz->id
        ];

        $this->json('DELETE', '/api/quiz/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_quiz_restore_endpoint()
    {

        $quiz = \App\Models\Quiz::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'quiz_id' => $quiz->id
        ];

        $this->json('POST', '/api/quiz/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_quiz_force_delete_endpoint()
    {

        $quiz = \App\Models\Quiz::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'quiz_id' => $quiz->id
        ];

        $this->json('DELETE', '/api/quiz/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_quiz_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/quiz/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
