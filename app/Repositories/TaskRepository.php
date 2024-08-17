<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\TaskRepositoryInterface;
use App\DTO\TaskDTO;
use App\Models\Task;
use App\Http\Resources\TaskResource;

final class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Create a new task in the database.
     *
     * @param TaskDTO $taskDTO Data Transfer Object containing task details.
     * @return Task The created Task model instance.
     */
    public function create(TaskDTO $taskDTO): Task
    {
        return Task::create([
            'name' => $taskDTO->name,
            'description' => $taskDTO->description,
            'status' => $taskDTO->status,
        ]);
    }

    /**
     * Retrieve all tasks from the database.
     *
     * @return array An array of all tasks.
     */
    public function getAll(): array
    {
        return Task::all()->toArray();
    }

    /**
     * Find a task by its ID.
     *
     * @param int $id The ID of the task to retrieve.
     * @return Task|null The Task model instance if found, or null if not.
     */
    public function getById(int $id): ?Task
    {
        return Task::find($id);
    }

    /**
     * Update an existing task in the database.
     *
     * @param TaskDTO $taskDTO Data Transfer Object containing updated task details.
     * @param int $id The ID of the task to update.
     * @return bool True if the task was updated successfully, false otherwise.
     */
    public function update(TaskDTO $taskDTO, int $id): bool
    {
        $task = $this->getById($id);

        if (!$task) {
            return false;
        }

        $task->update([
            'name' => $taskDTO->name,
            'description' => $taskDTO->description,
            'status' => $taskDTO->status,
        ]);

        return true;
    }

    /**
     * Delete a task by its ID.
     *
     * @param int $id The ID of the task to delete.
     * @return bool True if the task was deleted successfully, false otherwise.
     */
    public function delete(int $id): bool
    {
        $task = $this->getById($id);

        if (!$task) {
            return false;
        }

        return $task->delete();
    }
}
