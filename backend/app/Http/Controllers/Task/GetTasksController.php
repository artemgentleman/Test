<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class GetTasksController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'tasks' => Task::all(),
        ]);
    }
}
