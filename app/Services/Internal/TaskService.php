<?php

namespace App\Services\Internal;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $googleSheetRepository;
    protected $googleService;
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get all records of the google doc sheet
     *
     * @return void
     */
    public function retrieveTasks()
    {
        return $this->taskRepository->retrieveTasksByOrder()->with('project')->paginate(config('view.per_page_limit'));
    }

    /**
     * Function for create a task
     * @param $payload
     * @return void
     */
    public function storeTask($payload)
    {
        // assign order in payload as zero and
        $payload['order'] = 0;

        $createTask = $this->taskRepository->create($payload);

        if (!empty($createTask)) {
            // update task order after created successfully by task id
            $createTask->update(['order' => $createTask->id]);
        }
        return (!empty($createTask)) ? $createTask : [];
    }

    /**
     * Function for update a task
     * @param $payload
     * @param $task
     * @return void
     */
    public function updateTask($payload, $task)
    {
        $updatedTask = $this->taskRepository->update($payload->toArray(), $task->id);

        return (!empty($updatedTask)) ? $updatedTask : [];
    }

    /**
     * Function for delete task record
     *
     * @param $task
     * @return void
     */
    public function deleteRecord($task)
    {
        return $this->taskRepository->delete($task->id);
    }

    /**
     * Function for change task order while using drag and drop a task
     *
     * @param $request
     * @return void
     */
    public function changeTaskOrder($request)
    {
        $orders = $request->input('order');

        foreach ($orders as $key => $order) {
            $this->taskRepository->changeTaskOrder($order, $key);
        }
    }
}
