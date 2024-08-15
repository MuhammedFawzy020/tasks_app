<?php

namespace App\Services;

use App\Repositories\StatisticsRepository;
use Illuminate\Database\Eloquent\Collection;

class StatisticsService
{
    private $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function getTopUsersByTaskCount(int $limit = 10): Collection
    {
        return $this->statisticsRepository->getTopUsersByTaskCount($limit);
    }
}