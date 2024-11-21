<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GradeAdminController;
use App\Http\Controllers\StudentAdminController;
use App\Http\Controllers\DepartmentAdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/home',[HomeController::class,'index']);
Route::get('/contact', [ContactController::class,'indexx']);
Route::get('/student', [StudentController::class,'index']);
Route::get('/student-admin', [StudentAdminController::class,'index']);
Route::get('/grades', [GradeController::class,'index']);
Route::get('/grade-admin', [GradeAdminController::class,'index']);
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department-admin', [DepartmentAdminController::class, 'index']);
