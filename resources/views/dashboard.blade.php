<x-app-layout>
    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title text-[18px] font-bold">Total Projects</h5>
                        <h2>{{ $stats['total_projects'] ?? 0 }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title text-[18px] font-bold">Active Projects</h5>
                        <h2>{{ $stats['active_projects'] ?? 0 }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title text-[18px] font-bold">Team Members</h5>
                        <h2>{{ $stats['team_members'] ?? 0 }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-yellow-500 text-white">
                    <div class="card-body">
                        <h5 class="card-title text-[18px] font-bold">Pending Tasks</h5>
                        <h2>{{ $stats['pending_tasks'] ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Projects -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Projects</h5>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">New Project</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Status</th>
                                        <th>Progress</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentProjects ?? [] as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td><span
                                                    class="badge bg-{{ $project->status_color }}">{{ $project->status }}</span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: {{ $project->progress }}%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $project->end_date->format('M d, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No projects found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Create Project
                            </a>
                            <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary">
                                <i class="bi bi-list-task"></i> Add Task
                            </a>
                            <a href="{{ route('team.invite') }}" class="btn btn-outline-primary">
                                <i class="bi bi-person-plus"></i> Invite Team Member
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>