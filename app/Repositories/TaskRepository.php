<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository
{
    public function createTask(array $data): Task
    {
        return Task::create($data);
    }

    public function getTasks(int $perPage = 10): LengthAwarePaginator
    {
        return Task::with(['assignedTo', 'assignedBy'])
            ->paginate($perPage);
    }
}