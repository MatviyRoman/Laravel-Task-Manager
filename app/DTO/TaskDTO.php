<?php

declare(strict_types=1);

namespace App\DTO;

/**
 * Data Transfer Object for Task.
 *
 * This class is used to transfer task-related data between different layers of the application.
 */
final class TaskDTO
{
    /**
     * Create a new TaskDTO instance.
     *
     * @param string $name The name of the task.
     * @param string $description The description of the task.
     * @param string $status The status of the task, e.g., 'open' or 'closed'.
     */
    public function __construct(
        public string $name,
        public string $description,
        public string $status
    ) {}
}
