<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class UserTaskControllerTest extends TestCase
{
    // use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user and authenticate for testing
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }


    public function test_show_completed_tasks()
    {
        // Arrange create dummy data for testing so dont have to create manually
        $task1 = Task::factory()->create(['status' => 'completed', 'created_by' => $this->user->id]);
        $task2 = Task::factory()->create(['status' => 'completed', 'assigned_to' => $this->user->id]);

        // Act  calling a function
        $response = $this->get('/user/completed-tasks');

        // Assert  checks if the result is same as expected
        $response->assertStatus(200); //we want to see page is loaded successfully
        $response->assertViewIs('user.usercompletedtasks'); //want to confirm view usercompletedtasks is used
        $response->assertViewHas('completedTasks', function ($tasks) use ($task1, $task2) {
            return $tasks->contains($task1) && $tasks->contains($task2);
        });
    }
    public function test_show_inprogress_tasks()
    {
        // Arrange
        $task = Task::factory()->create(['status' => 'inprogress', 'created_by' => $this->user->id]);

        // Act
        $response = $this->get('/user/inprogress-tasks');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('user.inprogresstasks');
        $response->assertViewHas('inprogressTasks', function ($tasks) use ($task) {
            return $tasks->contains($task);
        });
    }
    public function test_show_overdue_tasks()
    {
        // Arrange
        $task = Task::factory()->create(['status' => 'overdue', 'created_by' => $this->user->id]);

        // Act
        $response = $this->get('/user/overdue-tasks');

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('user.overduetasks');
        $response->assertViewHas('overdueTasks', function ($tasks) use ($task) {
            return $tasks->contains($task);
        });
    }
    public function test_create_task()
    {
        // Arrange
        $taskData = [
            'name' => 'New Task',
            'status' => 'inprogress',
            'task_description' => 'This is a test task description.',
            'duedate' => now()->addDays(5)->format('Y-m-d'),
        ];

        // Act
        $response = $this->post('/tasks', $taskData);

        // Assert
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Task added successfully!');
        $this->assertDatabaseHas('tasks', $taskData);
    }
    public function test_update_task()
    {
        // Arrange
        $task = Task::factory()->create(['created_by' => $this->user->id]);
        $updatedData = [
            'name' => 'Updated Task Name',
            'status' => 'completed',
            'task_description' => 'Updated description.',
            'duedate' => now()->addDays(2)->format('Y-m-d'),
        ];

        // Act
        $response = $this->put("/tasks/{$task->id}", $updatedData);

        // Assert
        $response->assertRedirect(route('userdashboard'));
        $response->assertSessionHas('success', 'Task updated successfully');
        $this->assertDatabaseHas('tasks', $updatedData);
    }
    public function test_admin_destroy_task()
    {
        // Arrange
        $task = Task::factory()->create();

        // Act
        $response = $this->delete("/admin/tasks/{$task->id}");

        // Assert
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Task Deleted successfully');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
    public function test_reassign_admin_task()
    {
        // Arrange
        $task = Task::factory()->create(['assigned_to' => $this->user->id]);
        $newUser = User::factory()->create();

        // Act
        $response = $this->patch("/admin/tasks/{$task->id}/reassign", [
            'new_assignee' => $newUser->id,
        ]);

        // Assert
        $response->assertRedirect();
        $response->assertSessionHas('success', 'Task reassigned successfully');
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'assigned_to' => $newUser->id,
        ]);
    }
}
