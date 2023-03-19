<?php

namespace App\Http\Services;


use App\Models\task;
use Illuminate\Support\Facades\Auth;


class TaskService extends Service
{
    /**
     * @return array
     */
    public function getList (): array
    {
        try {
            $tasks = Task::all();

            return $this->responseSuccess("Done!", ['tasks' => $tasks]);
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function getTask (int $id): array
    {
        try {
            $task = Task::where('user_id', Auth::id())->where('id', $id)->first();

            return $this->responseSuccess("Done!", ['task' => $task]);
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function store (array $data): array
    {
        try {
            Task::create([
                'user_id' => Auth::id(),
                'title' => $data['title'],
                'description' => $data['description']
            ]);
            return $this->responseSuccess("Task added successfully!");
        }
        catch (\Exception $exception) {
            return $this->responseError( $exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateTask(array $data): array
    {
        try {
            $task = Task::where('user_id', Auth::id())->where('id', $data['id'])->first();
            if (is_null($task)) {
                return $this->responseError("Task doesn't exist!");
            }
            $task->update([
                'title' => $data['title'],
                'content' => $data['content']
            ]);
            return $this->responseSuccess("Task updated successfully!");
        }
        catch (\Exception $exception) {
            return $this->responseError( $exception->getMessage());
        }
    }

    public function deleteTask (int $id): array
    {
        try {
            $task = Task::where('user_id', Auth::id())->where('id', $id)->first();
            if (is_null($task)) {
                return $this->responseError("Task Doesn't exits");
            }
            $task->delete();
            return $this->responseSuccess("Task deleted successfully");
        }
        catch (\Exception $exception) {
            return $this->responseError($exception->getMessage());
        }
    }

}


