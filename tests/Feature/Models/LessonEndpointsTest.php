<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LessonEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_lesson_policies_endpoint()
    {

        $lesson = \App\Models\Lesson::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $lesson->id
        ];

        $this->json('GET', '/api/lesson/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_lesson_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/lesson/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_lesson_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/lesson/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_lesson_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/lesson/index', $payload, $headers)
            ->assertStatus(200);
            
    }
    
    public function test_lesson_show_auth_endpoint()
    {

        $lesson = \App\Models\Lesson::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'lesson_id' => $lesson->id
        ];

        $this->json('GET', '/api/lesson/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_lesson_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $lesson = \App\Models\Lesson::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'lesson_id' => $lesson->id
        ];

        $this->json('GET', '/api/lesson/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_lesson_create_endpoint()
    {

        $section = \App\Models\Section::factory()->create([
            'course_id' => \App\Models\Course::factory()->create()->id
        ]);

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Lesson::factory()->make()->getAttributes();

        $this->json('POST', '/api/lesson/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_lesson_update_endpoint()
    {

        $lesson = \App\Models\Lesson::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Lesson::factory()->make()->getAttributes(),
            'lesson_id' => $lesson->id
        ];

        $this->json('PUT', '/api/lesson/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_lesson_delete_endpoint()
    {

        $lesson = \App\Models\Lesson::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'lesson_id' => $lesson->id
        ];

        $this->json('DELETE', '/api/lesson/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_lesson_restore_endpoint()
    {

        $lesson = \App\Models\Lesson::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'lesson_id' => $lesson->id
        ];

        $this->json('POST', '/api/lesson/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_lesson_force_delete_endpoint()
    {

        $lesson = \App\Models\Lesson::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'lesson_id' => $lesson->id
        ];

        $this->json('DELETE', '/api/lesson/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    /*

    public function test_lesson_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/lesson/export', $payload, $headers)
            ->assertStatus(200);
            
    }
    */

}
