<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\TaskRepositoryInterface;
use App\DTO\TaskDTO;
use App\Models\Task;

/**
 * Class TaskService
 *
 * Provides business logic for managing tasks.
 */
final class TaskService
{
    /**
     * Create a new instance of TaskService.
     *
     * @param TaskRepositoryInterface $taskRepository The repository used to interact with tasks.
     */
    public function __construct(protected TaskRepositoryInterface $taskRepository) {}

    /**
     * Create a new task.
     *
     * @param TaskDTO $taskDTO Data transfer object containing task information.
     * @return Task The created Task model instance.
     */
    public function createTask(TaskDTO $taskDTO): Task
    {
        return $this->taskRepository->create($taskDTO);
    }

    /**
     * Retrieve all tasks.
     *
     * @return array An array of Task model instances.
     */
    public function getAllTasks(): array
    {
        return $this->taskRepository->getAll();
    }

    /**
     * Retrieve a task by its identifier.
     *
     * @param int $id The unique identifier of the task.
     * @return Task|null The Task model instance if found, null otherwise.
     */
    public function getTaskById(int $id): ?Task
    {
        return $this->taskRepository->getById($id);
    }

    /**
     * Update an existing task.
     *
     * @param TaskDTO $taskDTO Data transfer object containing updated task information.
     * @param int $id The unique identifier of the task to update.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateTask(TaskDTO $taskDTO, int $id): bool
    {
        return $this->taskRepository->update($taskDTO, $id);
    }

    /**
     * Delete a task by its identifier.
     *
     * @param int $id The unique identifier of the task to delete.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteTask(int $id): bool
    {
        return $this->taskRepository->delete($id);
    }
}
