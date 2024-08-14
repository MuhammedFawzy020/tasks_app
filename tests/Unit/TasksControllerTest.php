<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Mockery;
use App\Models\User;
use App\Services\TaskService;
use App\Http\Controllers\TasksController;
use Illuminate\Validation\ValidationException;

class TasksControllerTest extends TestCase
{
    protected $taskService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->taskService = Mockery::mock(TaskService::class);
    }


    public function showsCreateTaskFormNonAdminUsers()
    {
        
        $nonAdminUsers = User::factory()->count(2)->create(['is_admin' => false]);
        User::factory()->create(['is_admin' => true]);
        $controller = new TasksController($this->taskService);
        $response = $controller->create();
        $this->assertInstanceOf(View::class, $response);
        $this->assertTrue($response->getData()['nonAdminUsers']->contains($nonAdminUsers->first()));
    }

    public function itStoreTaskSuccessfully()
    {
        
        // $user = User::factory()->create(['is_admin' => false]);
        $normalUser = User::where('is_admin' ,false)->first();
        $adminUser = User::where('is_admin' ,true)->first(); 
        $data = [
            'title' => 'Test Task',
            'description' => 'Task Description',
            'assigned_to_id' => $normalUser->id,
            'assigned_by_id' => $adminUser->id,
        ];

        $this->taskService->shouldReceive('createTask')
            ->once()
            ->with($data);

        $controller = new TasksController($this->taskService);
        $request = Request::create('/tasks', 'POST', $data);
        $response = $controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('tasks-index'), $response->getTargetUrl());
    }

  
    public function redirectsBackWithErrorsWhenValidationFails()
    {
    
        $this->taskService = Mockery::mock(TaskService::class);
        $controller = new TasksController($this->taskService);
        $request = Request::create('/tasks', 'POST', []);
        $this->expectException(ValidationException::class);

        $controller->store($request);
    }

}

