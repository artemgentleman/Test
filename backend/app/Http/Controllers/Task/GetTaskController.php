<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class GetTaskController extends Controller
{
    public function __invoke(int $id)
    {
        $task = Task::query()->findOrFail($id);

        return response()->json([
            'task' => $task,
        ]);
    }
}
