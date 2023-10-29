<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\Internal\ProjectService;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{

    protected $project;
    protected $view;
    protected $projectService;

    public function __construct(Project $project, ProjectService $projectService)
    {
        $this->project = $project;
        $this->view = '.project.';
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectService->retrieveProjects();

        return response()->json($projects);
        // return view($this->view . 'index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $storedProject = $this->projectService->storeProject($request);

        if ($storedProject) {
            // project created successfully
            return back()->with(['success' => 'Project created successfully.']);
        } else {
            // If storing the project fails, return to the form with errors
            return back()->withErrors(['error' => 'Failed to create the project'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view($this->view . 'edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $updatedProject = $this->projectService->updateProject($request, $project);

        if ($updatedProject) {
            // project updated successfully
            return back()->with(['success' => 'Project updated successfully.']);
        } else {
            // If storing the project fails, return to the form with errors
            return back()->withErrors(['error' => 'Failed to create the project'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->projectService->deleteRecord($project);

        return back()->with(['success' => 'Project deleted successfully.']);
    }
}
