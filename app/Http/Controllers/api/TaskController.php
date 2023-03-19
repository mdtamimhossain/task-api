<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Services\TaskService;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostReaction;

use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }


    /**
     * @return JsonResponse
     */
    public function getList(): JsonResponse
    {
        return response()->json($this->service->getList());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getTask(int $id): JsonResponse
    {
        return response()->json($this->service->getTask($id));
    }

    /**
     * @param TaskStoreRequest $request
     * @return JsonResponse
     */
    public function store(TaskStoreRequest $request): JsonResponse
    {
        return response()->json($this->service->store($request->all()));
    }


    /**
     * @param TaskUpdateRequest $request
     * @return JsonResponse
     */
    public function updateTask(TaskUpdateRequest $request): JsonResponse
    {
        return response()->json($this->service->updateTask($request->all()));
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function deleteTask($id): JsonResponse
    {
        return response()->json($this->service->deleteTask($id));

    }



}
