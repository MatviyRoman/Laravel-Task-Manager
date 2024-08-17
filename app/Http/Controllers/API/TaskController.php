<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\DTO\TaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

final class TaskController extends Controller
{
    /**
     * Create a new instance of TaskController.
     *
     * @param TaskService $taskService
     */
    public function __construct(protected TaskService $taskService) {}

    /**
     * Store a newly created task in the database.
     *
     * @param TaskRequest $request
     * @return TaskResource
     */
    public function store(TaskRequest $request): TaskResource
    {
        $taskDTO = new TaskDTO(
            $request->input('name'),
            $request->input('description'),
            $request->input('status')
        );

        $task = $this->taskService->createTask($taskDTO);

        return new TaskResource($task);
    }

    /**
     * Display a listing of all tasks.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->taskService->getAllTasks());
    }

    /**
     * Display the specified task by its ID.
     *
     * @param int $id
     * @return TaskResource
     */
    public function show(int $id): TaskResource
    {
        $task = $this->taskService->getTaskById($id);

        return new TaskResource($task);
    }

    /**
     * Update the specified task in the database.
     *
     * @param TaskRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TaskRequest $request, int $id): JsonResponse
    {
        $taskDTO = new TaskDTO(
            $request->input('name'),
            $request->input('description'),
            $request->input('status')
        );

        $updated = $this->taskService->updateTask($taskDTO, $id);

        return response()->json(['updated' => $updated]);
    }

    /**
     * Remove the specified task from the database.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->taskService->deleteTask($id);

        return response()->json(['deleted' => $deleted]);
    }
}
