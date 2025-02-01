<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">Projects</h2>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i> New Project
            </a>
        </div>
    </x-slot>

    <div class="row">
        @foreach($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                        
                        <div class="mb-2">
                            <span class="badge bg-{{ $project->status === 'completed' ? 'success' : 'primary' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                            <span class="badge bg-info">{{ ucfirst($project->priority) }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Due: {{ $project->end_date->format('M d, Y') }}</small>
                            <div class="btn-group">
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
