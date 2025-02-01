<x-app-layout>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tasks</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                Create Task
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Project</th>
                                <th>Assigned To</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->project->name }}</td>
                                    <td>{{ $task->assignedTo->name }}</td>
                                    <td>{{ $task->due_date->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $task->priority === 'high' ? 'danger' : ($task->priority === 'medium' ? 'warning' : 'info') }}">
                                            {{ ucfirst($task->priority) }}
                                        </span>
                                    </td>
                                    <td>{{ ucfirst($task->status) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
