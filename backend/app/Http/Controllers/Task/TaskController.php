<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function createTaskView()
    {
        return view('task.create');
    }

    public function index()
    {
        $tasks = Task::query()->latest()->get();

        return view('task.index', compact('tasks'));
    }


    public function show($id)
    {
        $task = Task::query()->findOrFail($id);

        return view('task.show', compact('task'));
    }

    public function edit(string $id)
    {
        $task = Task::query()->findOrFail($id);

        return view('task.edit', compact('task'));
    }
}
