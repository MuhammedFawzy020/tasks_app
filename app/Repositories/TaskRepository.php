<?php

namespace App\Repositories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Service\StatisticsService;
class TaskRepository
{
    public function createTask(array $data): Tasks
    {
        return Tasks::create($data);
    }

    public function getTasks(int $perPage = 10): LengthAwarePaginator
    {
        return Tasks::with(['assignedTo', 'assignedBy'])
            ->paginate($perPage);
    }

    public function getlasttask(){
        return Tasks::latest()->first();
    }

    public function getUserTaskCounts(int $perPage = 10): LengthAwarePaginator
    {
        $taskCounts = Tasks::selectRaw('assigned_to_id, COUNT(*) as task_count')
            ->groupBy('assigned_to_id')
            ->orderBy('task_count' ,'desc')
            ->paginate($perPage);
    
        $userTaskCounts = [];
        foreach ($taskCounts as $taskCount) {
            $userTaskCounts[$taskCount->assigned_to_id] = $taskCount->task_count;
        }
    
        return $taskCounts;
    }
}