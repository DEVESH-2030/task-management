<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Services\Internal\TaskService;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\Internal\ProjectService;

class TaskController extends Controller
{
    protected $task;
    protected $view;
    protected $taskService;
    protected $projectService;

    public function __construct(Task $task, TaskService $taskService, ProjectService $projectService)
    {
        $this->task = $task;
        $this->view = '.task.';
        $this->taskService = $taskService;
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->retrieveTasks();

        return view($this->view . 'index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = $this->projectService->retrieveProjects();

        return view($this->view . 'create', ['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $storedTask = $this->taskService->storeTask($request->all());

        if ($storedTask) {
            // Task created successfully
            return back()->with(['success' => 'Task created successfully.']);
        } else {
            // If storing the task fails, return to the form with errors
            return back()->withErrors(['error' => 'Failed to create the task'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = $this->projectService->retrieveProjects();

        return view($this->view . 'edit-task', ['task' => $task, 'projects' => $projects])->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $updatedTask = $this->taskService->updateTask($request, $task);

        if ($updatedTask) {
            // Task updated successfully
            return back()->with(['success' => 'Task updated successfully.']);
        } else {
            // If storing the task fails, return to the form with errors
            return back()->withErrors(['error' => 'Failed to create the task'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskService->deleteRecord($task);

        return back()->with(['success' => 'Task deleted successfully.']);
    }

    /**
     * Function to update task order by using drag and drop as up, down only
     *
     * @param Request $request
     * @return void
     */
    public function updateOrder(Request $request)
    {
        $this->taskService->changeTaskOrder($request);

        return response('Order updated successfully', 200);
    }
}
