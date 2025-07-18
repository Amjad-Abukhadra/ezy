<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/course-selector', [CourseController::class, 'ShowCourseSelector'])->name('course.selector');
Route::get('/courses', [CourseController::class, 'ShowCourses'])->name('courses');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');

});
Route::delete('/admin/courses/{course}', [AdminController::class, 'destroy'])->name('admin.courses.destroy');

Route::get('/get-courses', [CourseController::class, 'getCourses']);
Route::get('/courses/{id}', [CourseController::class, 'showCoursePage'])->name('courses.page');

Route::post('/admin/courses/{course}/objectives', [CourseController::class, 'saveObjectives']);
Route::post('/admin/courses/{course}/projects', [CourseController::class, 'saveProjects']);
Route::post('/admin/courses/{course}/modules', [CourseController::class, 'saveModules']);
Route::post('/admin/courses/{course}/content', [CourseController::class, 'saveContent']);

