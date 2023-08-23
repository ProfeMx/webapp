<?php

namespace App\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteEndpointsTest extends TestCase
{

    public function test_note_policies_endpoint()
    {

        $note = \App\Models\Note::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $note->id
        ];

        $this->json('GET', '/api/note/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_note_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/note/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_note_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/note/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_note_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/note/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_note_show_auth_endpoint()
    {

        $note = \App\Models\Note::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'note_id' => $note->id
        ];

        $this->json('GET', '/api/note/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_note_show_guest_endpoint()
    {

        $note = \App\Models\Note::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'note_id' => $note->id
        ];

        $this->json('GET', '/api/note/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_note_create_endpoint()
    {

        $user = \App\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \App\Models\Note::factory()->make()->getAttributes();

        $this->json('POST', '/api/note/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_note_update_endpoint()
    {

        $note = \App\Models\Note::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\App\Models\Note::factory()->make()->getAttributes(),
            'note_id' => $note->id
        ];

        $this->json('PUT', '/api/note/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_note_delete_endpoint()
    {

        $note = \App\Models\Note::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'note_id' => $note->id
        ];

        $this->json('DELETE', '/api/note/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_note_restore_endpoint()
    {

        $note = \App\Models\Note::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'note_id' => $note->id
        ];

        $this->json('POST', '/api/note/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_note_force_delete_endpoint()
    {

        $note = \App\Models\Note::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'note_id' => $note->id
        ];

        $this->json('DELETE', '/api/note/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_note_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/note/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
