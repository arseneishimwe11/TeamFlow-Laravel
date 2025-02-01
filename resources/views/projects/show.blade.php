<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ $project->name }}</h2>
                <div>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h5>Description</h5>
                        <p>{{ $project->description }}</p>
                        
                        <h5 class="mt-4">Tasks</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Assigned To</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($project->tasks as $task)
                                        <tr>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->assignedTo->name }}</td>
                                            <td><span class="badge bg-{{ $task->status === 'completed' ? 'success' : 'primary' }}">{{ $task->status }}</span></td>
                                            <td>{{ $task->due_date->format('M d, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No tasks found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Project Details</h5>
                                <p><strong>Status:</strong> <span class="badge bg-{{ $project->status === 'completed' ? 'success' : 'primary' }}">{{ $project->status }}</span></p>
                                <p><strong>Created:</strong> {{ $project->created_at->format('M d, Y') }}</p>
                                <p><strong>Team Members:</strong></p>
                                <ul class="list-unstyled">
                                    @foreach($project->users as $user)
                                        <li>{{ $user->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
