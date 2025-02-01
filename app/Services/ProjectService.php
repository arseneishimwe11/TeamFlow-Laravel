<?php

namespace App\Services;

use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Notifications\ProjectCreatedNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function createProject(array $data)
    {
        $project = $this->projectRepository->createProject($data);

        // Notify admin users
        Notification::send(
            $this->getAdminUsers(),
            new ProjectCreatedNotification($project)
        );

        return $project;
    }

    public function updateProject($id, array $data)
    {
        return $this->projectRepository->updateProject($id, $data);
    }

    public function deleteProject($id)
    {
        return $this->projectRepository->deleteProject($id);
    }

    private function getAdminUsers()
    {
        return User::where('role', 'admin')->get();
    }

    public function getAllProjects()
    {
        return $this->projectRepository->getAllProjects();
    }

    public function getProjectById($id)
    {
        return $this->projectRepository->getProjectById($id);
    }
}
