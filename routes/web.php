<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\CertAppearController;


Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'dashboard'])->name('dashboard');

// Certificate of Appearance
Route::get('/cert_appearance_admin', [CertAppearController::class, 'admin'])->name('cert.appearance.admin');
Route::get('/cert_appearance', [CertAppearController::class, 'index'])->name('cert.appearance');
Route::get('/addcert_appearance', [CertAppearController::class, 'add'])->name('addcert.appearance');
Route::post('/form_cert_appearance', [CertAppearController::class, 'store'])->name('form.cert.appearance');
Route::get('/view_cert_appearance/{id}', [CertAppearController::class, 'viewpdf'])->name('view.cert.appearance');

// Application for Leave
Route::get('/leave_admin', [LeaveController::class, 'admin'])->name('leave.admin');
Route::get('/leave_user', [LeaveController::class, 'index'])->name('leave.user');
Route::get('/add_leave', [LeaveController::class, 'add'])->name('add.leave');
Route::post('/leave_form', [LeaveController::class, 'store'])->name('leave.form');
Route::get('/view_leave_form/{id}', [LeaveController::class, 'viewpdf'])->name('view.leave.form');


// Route::middleware(['check_admin_access'])->group(function () {
//     Route::get('/qrcode', [QrCodeController::class, 'show'])->name('qrcode');
// });
