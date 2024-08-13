<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TasksController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function create(): View
    {
        $nonAdminUsers = User::where('is_admin', false)->get();
        return view('tasks.create', compact('nonAdminUsers'));
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index');
    }

    public function index(Request $request): View
    {
        $tasks = $this->taskService->getTasks();
        return view('tasks.index', compact('tasks'));
    }
}