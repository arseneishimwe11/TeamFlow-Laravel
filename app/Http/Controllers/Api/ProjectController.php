<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return ProjectResource::collection($projects);
    }

    public function show($id)
    {
        $project = $this->projectService->getProjectById($id);
        return new ProjectResource($project);
    }

    public function store(Request $request)
    {
        $project = $this->projectService->createProject($request->validated());
        return new ProjectResource($project);
    }
}
