<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'dashboard'])->name('dashboard');

// User
Route::get('/add_user', [UserController::class, 'add'])->name('add.user');
Route::get('/edit_user{id}', [UserController::class, 'edit'])->name('edit.user');
Route::post('/update_user{id}', [UserController::class, 'update'])->name('update.user');
Route::post('/form_user', [UserController::class, 'store'])->name('store.user');
Route::get('/destroy_user{id}', [UserController::class, 'delete'])->name('delete.user');

// Department
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get('/add_department', [DepartmentController::class, 'add'])->name('add.department');
Route::get('/edit_department{id}', [DepartmentController::class, 'edit'])->name('edit.department');
Route::post('/form_department', [DepartmentController::class, 'store'])->name('store.department');
Route::post('/update_department{id}', [DepartmentController::class, 'update'])->name('update.department');
Route::get('/delete_department{id}', [DepartmentController::class, 'delete'])->name('delete.department');

// Activity
Route::get('/activity', [ActivityController::class, 'index'])->name('activity');
Route::get('/add_activity', [ActivityController::class, 'add'])->name('add.activity');
Route::get('/edit_activity{id}', [ActivityController::class, 'edit'])->name('edit.activity');
Route::post('/form_activity', [ActivityController::class, 'store'])->name('store.activity');
Route::post('/update_activity{id}', [ActivityController::class, 'update'])->name('update.activity');
Route::get('/delete_activity{id}', [ActivityController::class, 'delete'])->name('delete.activity');

Route::middleware(['check_admin_access'])->group(function () {
    Route::get('/users', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/department_admin', [DepartmentController::class, 'admin'])->name('department.admin');
    Route::get('/activity_admin', [ActivityController::class, 'admin'])->name('activity.admin');
});
