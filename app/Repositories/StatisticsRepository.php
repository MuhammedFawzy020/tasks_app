<?php

namespace App\Repositories;

use App\Models\Statistics;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class StatisticsRepository
{
    public function createStatistics(array $data): Tasks
    {
        return Statistics::create($data);
    }


    public function updateTaskCount(int $userId): void
    {
        $statistic = Statistics::firstOrCreate(['user_id' => $userId], ['tasks_count' => 0]);
        $statistic->update(['task_count' => Tasks::where('assigned_to_id', $userId)->count()]);
    }





    public function getTopUsersByTaskCount(int $limit = 10): Collection
    {
        return Statistics::with('user')
            ->whereHas('user', function ($query) {
                $query->where('is_admin', false);
            })
            ->orderBy('task_count', 'desc')
            ->limit($limit)
            ->get();
    }
}