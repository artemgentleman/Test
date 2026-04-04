<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class CreateTaskController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['sometimes', 'string', 'nullable'],
            'status' => ['required', 'string'],
        ]);

        $task = Task::create($data);

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task,
        ], 201);
    }
}
