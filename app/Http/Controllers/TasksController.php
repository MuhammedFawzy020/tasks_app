<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\TaskService;
use App\Services\StatisticsService;
use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;
use App\Models\Tasks;

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
        $adminUsers = User::where('is_admin', true)->get();
        return view('tasks.tasksCreate', compact('nonAdminUsers' ,'adminUsers'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required' ,
                'assigned_to_id' => 'required',
                'assigned_by_id' => 'required' ,
            ]);

            $this->taskService->createTask($validatedData);
            return redirect()->route('tasks-index');
        }
        catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function index(Request $request): View
    {
        $tasks = $this->taskService->getTasks();
        return view('tasks.tasksList', compact('tasks'));
    }


    public function statisticsIndex(Request $request): View
    {
        $stats = $this->taskService->getUserTaskCounts();
        return view('statistics.index', compact('stats'));
    }
}