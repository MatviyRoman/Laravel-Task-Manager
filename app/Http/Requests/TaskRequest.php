<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TaskRequest
 *
 * Handles validation for task-related requests.
 */
final class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool True if the user is authorized, false otherwise.
     */
    public function authorize(): bool
    {
        // Return true if authorization logic is not needed; otherwise, implement authorization checks here.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array The array of validation rules.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // The task name is required, must be a string, and cannot exceed 255 characters.
            'description' => 'required|string', // The task description is required and must be a string.
            'status' => 'required|in:open,closed', // The task status is required and must be either 'open' or 'closed'.
        ];
    }
}
