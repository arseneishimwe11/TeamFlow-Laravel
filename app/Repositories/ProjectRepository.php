<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function getAllProjects()
    {
        return $this->model->with(['users', 'tasks'])->latest()->get();
    }

    public function getProjectById($id)
    {
        return $this->model->with(['users', 'tasks'])->findOrFail($id);
    }

    public function createProject(array $data)
    {
        return $this->model->create($data);
    }

    public function updateProject($id, array $data)
    {
        $project = $this->model->findOrFail($id);
        $project->update($data);
        return $project;
    }

    public function deleteProject($id)
    {
        return $this->model->destroy($id);
    }

    public function getProjectsByUser($userId)
    {
        return $this->model->whereHas('users', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
    }
}
