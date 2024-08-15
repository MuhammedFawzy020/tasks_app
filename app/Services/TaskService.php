<?php

namespace App\Services;

use App\Models\User;
use App\Models\Statistics;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Tasks;
use App\Services\StatisticService;

class TaskService
{
    private $taskRepository;
    private $statisticService; 

    public function __construct(TaskRepository $taskRepository, StatisticService $statisticService)
    {
        $this->taskRepository = $taskRepository;
        $this->statisticService = $statisticService; 
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

        $this->statisticService->updateTaskCount($data['assigned_to_id']);

    }

    public function getTasks(int $perPage = 10): LengthAwarePaginator
    {
        return $this->taskRepository->getTasks($perPage);
    }

    public function getUserTaskCounts(int $perPage = 10): LengthAwarePaginator
    {
        return $this->taskRepository->getUserTaskCounts($perPage);
    }
}