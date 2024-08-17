<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Enum TaskStatus
 *
 * Defines the possible statuses for a task.
 */
enum TaskStatus: string
{
    /**
     * Represents an open task status.
     */
    case OPEN = 'open';

    /**
     * Represents a closed task status.
     */
    case CLOSED = 'closed';
}
