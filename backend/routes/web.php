<?php

use App\Http\Controllers\Task\ChangeTaskStatusController;
use App\Http\Controllers\Task\CreateTaskController;
use App\Http\Controllers\Task\DeleteTaskController;
use App\Http\Controllers\Task\GetTaskController;
use App\Http\Controllers\Task\GetTasksController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Task\UpdateTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']);

Route::get('/tasks', GetTasksController::class);
Route::get('/tasks/index', [TaskController::class, 'index']);
Route::get('/tasks/{id}', GetTaskController::class);
Route::get('/tasks/show/{id}', [TaskController::class, 'show']);
Route::post('/tasks', CreateTaskController::class);
Route::get('/tasks', [TaskController::class, 'createTaskView']);
Route::put('/tasks/{id}', UpdateTaskController::class);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::delete('/tasks/{id}', DeleteTaskController::class);
Route::patch('/tasks/{id}/status', ChangeTaskStatusController::class);
