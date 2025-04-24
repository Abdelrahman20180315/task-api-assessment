<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request): JsonResponse
    {
        try {
            $task = Cache::remember("task_create_{$request->title}", 600, function () use ($request) {
                return Task::create($request->validated());
            });
            return response()->json(['data' => $task], 201);
        } catch (\Exception $e) {
            return response()->json(['errors' => ['server' => 'Failed to create task']], 500);
        }
    }
}
