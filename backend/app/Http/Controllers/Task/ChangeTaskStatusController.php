<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ChangeTaskStatusController extends Controller
{
    public function __invoke(Request $request, int $id)
    {
        $request->validate([
            'status' => ['required', 'string'],
        ]);

        $task = Task::query()->findOrFail($id);

        $task->update([
            'status' => $request->input('status'),
        ]);

        return response()->json([
            'message' => 'Task status updated successfully',
            'task' => $task,
        ]);
    }
}
