<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GradeAdminController;
use App\Http\Controllers\Admin\StudentAdminController;
use App\Http\Controllers\Admin\DepartmentAdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin_view.admin');
});
Route::get('/home',[HomeController::class,'index']);
Route::get('/contact', [ContactController::class,'indexx']);
Route::get('/student', [StudentController::class,'index']);
Route::get('/student-admin', [StudentAdminController::class,'index']);
Route::get('/grades', [GradeController::class,'index']);
Route::get('/grade-admin', [GradeAdminController::class,'index']);
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department-admin', [DepartmentAdminController::class, 'index']);

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/{student}', [StudentController::class, 'show']);
});

Route::prefix('admin')->group(function () {
    Route::prefix('students')->group(function () {
        Route::get('/', [StudentAdminController::class, 'index']);
        Route::get('/create', [StudentAdminController::class, 'create']);
        Route::post('/store', [StudentAdminController::class, 'store']);
        Route::get('/edit/{student}', [StudentAdminController::class, 'edit']);
        Route::put('/update/{student}', [StudentAdminController::class, 'update']);
        Route::delete('/delete/{student}', [StudentAdminController::class, 'destroy']);
    });
});

    Route::prefix('admin/grades')->group(function () {
        Route::get('/', [GradeAdminController::class, 'index']);
        Route::get('/create', [GradeAdminController::class, 'create']);
        Route::post('/store', [GradeAdminController::class, 'store']);
        Route::get('/edit/{grade}', [GradeAdminController::class, 'edit']);
        Route::put('/update/{grade}', [GradeAdminController::class, 'update']);
        Route::delete('/delete/{grade}', [GradeAdminController::class, 'destroy']);
    });
Route::prefix('admin/departments')->group(function () {
    Route::get('/', [DepartmentAdminController::class, 'index'])->name('departments.index');
    Route::get('/create', [DepartmentAdminController::class, 'create'])->name('departments.create');
    Route::post('/store', [DepartmentAdminController::class, 'store'])->name('departments.store');
    Route::get('/edit/{departments}', [DepartmentAdminController::class, 'edit'])->name('departments.edit');
    Route::put('/update/{departments}', [DepartmentAdminController::class, 'update'])->name('departments.update');
    Route::delete('/delete/{departments}', [DepartmentAdminController::class, 'destroy'])->name('departments.destroy');
});
