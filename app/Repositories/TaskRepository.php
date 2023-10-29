<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository
{
    protected $moda;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->whereId($id);
    }

    /**
     * Function to change/update task order
     */
    public function changeTaskOrder($taskId, $taskOrder)
    {
        $this->model->where('id', $taskId)->update(['order' => $taskOrder + 1]);
    }
}
