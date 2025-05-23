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

// --- Parent rutas INE/Photo --- //
Route::get('parent/dashboard/documentos', [DashboardController::class, 'dirAgregarDocs'])->name('parent.dir.agregar');
Route::put('parent/dashboard/documentos', [DashboardController::class, 'AgregarDocs'])->name('parent.agregar');
Route::get('parent/dashboard/autorizado/editar', [DashboardController::class, 'dirEditarDocs'])->name('parent.dir.editar');
Route::put('parent/dashboard/autorizado/editar', [DashboardController::class, 'editarDocs'])->name('parent.editar');

// --- Autorizado rutas --- //
Route::get('parent/dashboard/autorizar', [DashboardController::class, 'autorizar'])->name('parent.autorizar');
Route::put('parent/dashboard/autorizado/agregar', [DashboardController::class, 'nuevoAutorizado'])->name('autorizado.agregar');
Route::put('parent/dashboard/autorizado/{id}/editar', [DashboardController::class, 'editarAutorizado'])->name('autorizado.editar');
Route::get('parent/dashboard/autorizado/{id}/editar', [DashboardController::class, 'editAutorizado'])->name('autorizado.edit');
Route::delete('parent/dashboard/autorizado/eliminar/{id}', [DashboardController::class, 'eliminarAutorizado'])->name('autorizado.eliminar');

// Route::get('parent/dashboard/pdf', [DashboardController::class, 'crearpdf'])->name('parent.pdf');
// Route::get('parent/dashboard/pdf/auto', [DashboardController::class, 'crearpdfauto'])->name('autorizado.pdf');

// --- Descargar QR --- //
Route::get('download/qrparent', [DashboardController::class, 'descargarQrParent'])->name('descargar.qr.parent');
Route::get('mostrar/qrparent', [DashboardController::class, 'mostrarQrParent'])->name('mostrar.qr.parent');
Route::get('download/qrautorizado/{id}', [DashboardController::class, 'descargarQrAutorizado'])->name('descargar.qr.autorizado');

// --- Vista Info Parent --- //
Route::get('parent/dashboard/{id}', [DashboardController::class, 'abrirInfoParent']);
// --- Vista Info Autorizado --- //
Route::get('parent/dashboard/autorizado/{id}', [DashboardController::class, 'abrirInfoAutorizado']);


