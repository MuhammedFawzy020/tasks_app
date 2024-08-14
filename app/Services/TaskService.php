<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Tasks;
class TaskService
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(array $data): void
    {
        $assignedToUser = User::findOrFail($data['assigned_to_id']);
        if ($assignedToUser->is_admin) {
            throw new \Exception('Cannot assign task to an admin user.');
        }

        $this->taskRepository->createTask([
            'title' => $data['title'],
            'description' => $data['description'],
            'assigned_to_id' => $data['assigned_to_id'],
            'assigned_by_id' => $data['assigned_by_id'],
        ]);
    }

    public function getTasks(int $perPage = 10): LengthAwarePaginator
    {
        return $this->taskRepository->getTasks($perPage);
    }
}