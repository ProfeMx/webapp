<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Tests\TestCase;

class VideoEndpointsTest extends TestCase
{

    public function test_video_policies_endpoint()
    {

        $video = \App\Models\Video::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $video->id
        ];

        $this->json('GET', '/api/video/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_video_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/video/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_video_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/video/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_video_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/video/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_video_show_auth_endpoint()
    {

        $video = \App\Models\Video::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'video_id' => $video->id
        ];

        $this->json('GET', '/api/video/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_video_show_guest_endpoint()
    {

        $video = \App\Models\Video::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'video_id' => $video->id
        ];

        $this->json('GET', '/api/video/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_video_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Video::factory()->make()->getAttributes();

        $this->json('POST', '/api/video/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_video_update_endpoint()
    {

        $video = \App\Models\Video::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Video::factory()->make()->getAttributes(),
            'video_id' => $video->id
        ];

        $this->json('PUT', '/api/video/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_video_delete_endpoint()
    {

        $video = \App\Models\Video::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'video_id' => $video->id
        ];

        $this->json('DELETE', '/api/video/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_video_restore_endpoint()
    {

        $video = \App\Models\Video::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'video_id' => $video->id
        ];

        $this->json('POST', '/api/video/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_video_force_delete_endpoint()
    {

        $video = \App\Models\Video::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'video_id' => $video->id
        ];

        $this->json('DELETE', '/api/video/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_video_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/video/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
