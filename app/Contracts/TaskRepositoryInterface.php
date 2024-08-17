<?php

declare(strict_types=1);

namespace App\Contracts;

use App\DTO\TaskDTO;
use App\Models\Task;

/**
 * Interface TaskRepositoryInterface
 *
 * Defines the contract for a repository handling tasks.
 */
interface TaskRepositoryInterface
{
    /**
     * Create a new task.
     *
     * @param TaskDTO $taskDTO Data transfer object containing task information.
     * @return Task The created Task model instance.
     */
    public function create(TaskDTO $taskDTO): Task;

    /**
     * Retrieve all tasks.
     *
     * @return array An array of Task model instances.
     */
    public function getAll(): array;

    /**
     * Retrieve a task by its identifier.
     *
     * @param int $id The unique identifier of the task.
     * @return Task|null The Task model instance if found, null otherwise.
     */
    public function getById(int $id): ?Task;

    /**
     * Update an existing task.
     *
     * @param TaskDTO $taskDTO Data transfer object containing updated task information.
     * @param int $id The unique identifier of the task to update.
     * @return bool True if the update was successful, false otherwise.
     */
    public function update(TaskDTO $taskDTO, int $id): bool;

    /**
     * Delete a task by its identifier.
     *
     * @param int $id The unique identifier of the task to delete.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function delete(int $id): bool;
}
