<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionEndpointsTest extends TestCase
{

    public function test_question_policies_endpoint()
    {

        $question = \App\Models\Question::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $question->id
        ];

        $this->json('GET', '/api/question/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_question_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/question/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_question_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/question/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_question_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/question/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_question_show_auth_endpoint()
    {

        $question = \App\Models\Question::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'question_id' => $question->id
        ];

        $this->json('GET', '/api/question/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_question_show_guest_endpoint()
    {

        $question = \App\Models\Question::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'question_id' => $question->id
        ];

        $this->json('GET', '/api/question/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_question_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Question::factory()->make()->getAttributes();

        $this->json('POST', '/api/question/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_question_update_endpoint()
    {

        $question = \App\Models\Question::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Question::factory()->make()->getAttributes(),
            'question_id' => $question->id
        ];

        $this->json('PUT', '/api/question/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_question_delete_endpoint()
    {

        $question = \App\Models\Question::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'question_id' => $question->id
        ];

        $this->json('DELETE', '/api/question/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_question_restore_endpoint()
    {

        $question = \App\Models\Question::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'question_id' => $question->id
        ];

        $this->json('POST', '/api/question/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_question_force_delete_endpoint()
    {

        $question = \App\Models\Question::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'question_id' => $question->id
        ];

        $this->json('DELETE', '/api/question/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_question_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/question/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
