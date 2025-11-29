<?php

namespace App\Http\Controllers;

use App\Http\Resources\FailedRow\FailedRowResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\FailedRow;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::with('user', 'file')->withCount('failedRows')->paginate(5);
        $tasks = TaskResource::collection($tasks);
        return inertia('Task/Index', [
            'tasks' => $tasks,
        ]);
    }

    public function failedList(Task $task)
    {
        $failedList = FailedRow::where('task_id', $task->id)->paginate(5);
        $failedList = FailedRowResource::collection($failedList);
        return inertia('Task/FailedList', [
            'failedRows' => $failedList,
        ]);
    }
}
