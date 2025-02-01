<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;

class DashboardService
{
    public function getStats()
    {
        return [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('status', 'in_progress')->count(),
            'completed_projects' => Project::where('status', 'completed')->count(),
            'pending_tasks' => Task::where('status', 'pending')->count(),
        ];
    }

    public function getRecentProjects()
    {
        return Project::with(['users'])
            ->latest()
            ->take(5)
            ->get();
    }

    public function getProjectsByStatus()
    {
        return Project::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get();
    }

    public function getUpcomingDeadlines()
    {
        return Project::where('end_date', '>', now())
            ->where('end_date', '<', now()->addDays(7))
            ->orderBy('end_date')
            ->get();
    }
}
