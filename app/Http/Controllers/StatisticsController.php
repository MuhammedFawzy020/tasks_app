<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    private $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index(): View
    {
        $topUsers = $this->statisticsService->getTopUsersByTaskCount();
        return view('statistics.index', compact('topUsers'));
    }
}