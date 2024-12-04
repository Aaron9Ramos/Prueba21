<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ParentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'Authlogout']);


/* 
Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->middleware('admin');
Route::get('admin/list/list', [AdminController::class, 'list'])->middleware('admin'); */

Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
});

Route::get('teacher/dashboard', [DashboardController::class, 'dashboard'])->middleware('teacher');

Route::get('parent/dashboard', [DashboardController::class, 'dashboard'])->middleware('parent');
