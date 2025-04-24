<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task(): void
    {
        $data = [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'status' => 'To Do',
            'priority' => 'High',
        ];

        $response = $this->postJson('/api/tasks', $data);

        $response->assertStatus(201)
                 ->assertJsonStructure(['data' => [
                     'id', 'title', 'description', 'status', 'priority', 'created_at', 'updated_at'
                 ]]);

        $this->assertDatabaseHas('tasks', $data);
    }

    public function test_validation_fails_for_invalid_data(): void
    {
        $data = [
            'title' => '',
            'status' => 'Invalid',
            'priority' => 'Invalid',
        ];

        $response = $this->postJson('/api/tasks', $data);

        $response->assertStatus(422)
                 ->assertJsonStructure(['errors' => ['title', 'status', 'priority']]);
    }
}
