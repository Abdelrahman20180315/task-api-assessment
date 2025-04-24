<?php

use Illuminate\Support\Facades\Route;

Route::post('/tasks', [App\Http\Controllers\Api\TaskController::class, 'store']);
