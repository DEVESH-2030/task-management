<?php

namespace App\Services\Internal;

use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $googleSheetRepository;
    protected $googleService;
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Get all projects
     *
     * @return void
     */
    public function retrieveProjects()
    {
        return $this->projectRepository->getAll()->paginate(config('view.per_page_limit'));
    }

    /**
     * Function for create a project
     * @param $payload
     * @return void
     */
    public function storeProject($payload)
    {
        $createdProject = $this->projectRepository->create($payload->toArray());

        return (!empty($createdProject)) ? $createdProject : [];
    }

    /**
     * Function for update a project
     * @param $payload
     * @param $project
     * @return void
     */
    public function updateProject($payload, $project)
    {
        $updatedProject = $this->projectRepository->update($payload->toArray(), $project->id);

        return (!empty($updatedProject)) ? $updatedProject : [];
    }

    /**
     * Function for delete project
     *
     * @param $project
     * @return void
     */
    public function deleteRecord($project)
    {
        return $this->projectRepository->delete($project->id);
    }
}
