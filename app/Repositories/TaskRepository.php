<?php

namespace App\Repositories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
}