<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Services\ProjectService;
use App\Events\ProjectCreated;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectRepository;
    protected $projectService;

    public function __construct(
        ProjectRepositoryInterface $projectRepository,
        ProjectService $projectService
    ) {
        $this->projectRepository = $projectRepository;
        $this->projectService = $projectService;
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = $this->projectRepository->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $project = $this->projectService->createProject($request->validated());
        event(new ProjectCreated($project));
        
        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully');
    }

    public function show($id)
    {
        $project = $this->projectRepository->getProjectById($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = $this->projectRepository->getProjectById($id);
        return view('projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $this->projectService->updateProject($id, $request->validated());
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }

    public function destroy($id)
    {
        $this->projectService->deleteProject($id);
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
