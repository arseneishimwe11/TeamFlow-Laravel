<?php

namespace App\Repositories\Interfaces;

interface ProjectRepositoryInterface
{
    public function getAllProjects();
    public function getProjectById($id);
    public function deleteProject($id);
    public function createProject(array $data);
    public function updateProject($id, array $data);
    public function getProjectsByUser($userId);
}
