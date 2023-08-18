<?php

namespace App\Tests\Feature\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_course_policies_endpoint()
    {

        $course = \App\Models\Course::factory()->create();
        
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $course->id
        ];

        $this->json('GET', '/api/course/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_course_policy_endpoint()
    {
        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/course/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_course_index_auth_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/course/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_course_index_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/course/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_course_show_auth_endpoint()
    {

        $course = \App\Models\Course::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_id' => $course->id
        ];

        $this->json('GET', '/api/course/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_show_guest_endpoint()
    {

        Auth::guard('web')->logout();

        $course = \App\Models\Course::factory()->create();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_id' => $course->id
        ];

        $this->json('GET', '/api/course/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_course_create_endpoint()
    {

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Course::factory()->make()->getAttributes();

        $this->json('POST', '/api/course/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_course_update_endpoint()
    {

        $course = \App\Models\Course::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Course::factory()->make()->getAttributes(),
            'course_id' => $course->id
        ];

        $this->json('PUT', '/api/course/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_delete_endpoint()
    {

        $course = \App\Models\Course::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_id' => $course->id
        ];

        $this->json('DELETE', '/api/course/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_restore_endpoint()
    {

        $course = \App\Models\Course::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_id' => $course->id
        ];

        $this->json('POST', '/api/course/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_course_force_delete_endpoint()
    {

        $course = \App\Models\Course::factory()->create();

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'course_id' => $course->id
        ];

        $this->json('DELETE', '/api/course/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }


    /*

    public function test_course_export_endpoint()
    {   

        $headers = [
            // 'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/course/export', $payload, $headers)
            ->assertStatus(200);
            
    }
    */

}
