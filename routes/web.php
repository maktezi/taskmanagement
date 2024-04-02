<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'dashboard'])->name('dashboard');

// Annex F 2316 Form
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get('/add_department', [DepartmentController::class, 'add'])->name('add.department');
Route::get('/edit_department{id}', [DepartmentController::class, 'edit'])->name('edit.department');
Route::post('/form_department', [DepartmentController::class, 'store'])->name('store.department');
Route::post('/update_department{id}', [DepartmentController::class, 'update'])->name('update.department');
Route::get('/delete_department{id}', [DepartmentController::class, 'delete'])->name('delete.department');

Route::middleware(['check_admin_access'])->group(function () {
    Route::get('/users', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/department_admin', [DepartmentController::class, 'admin'])->name('department.admin');
    // Route::get('/qrcode', [QrCodeController::class, 'show'])->name('qrcode');
});
