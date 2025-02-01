<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">Edit Project</h2>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $project->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" 
                              rows="3">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
