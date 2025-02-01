<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('status', 'in_progress')->count(),
            'team_members' => User::count(),
            'pending_tasks' => Task::where('status', 'pending')->count()
        ];

        $recentProjects = Project::latest()
            ->take(5)
            ->get()
            ->map(function ($project) {
                $project->status_color = $this->getStatusColor($project->status);
                $project->progress = $this->calculateProgress($project);
                return $project;
            });

        return view('dashboard', compact('stats', 'recentProjects'));
    }

    private function getStatusColor($status)
    {
        return [
            'pending' => 'warning',
            'in_progress' => 'primary',
            'completed' => 'success',
            'on_hold' => 'secondary'
        ][$status] ?? 'primary';
    }

    private function calculateProgress($project)
    {
        // Calculate project progress based on completed tasks
        $totalTasks = $project->tasks()->count();
        if ($totalTasks === 0)
            return 0;

        $completedTasks = $project->tasks()->where('status', 'completed')->count();
        return ($completedTasks / $totalTasks) * 100;
    }
}
