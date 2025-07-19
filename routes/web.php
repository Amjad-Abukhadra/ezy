<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;


//public routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/', function () {
    return view('home');
});
Route::get('/get-courses', [CourseController::class, 'getCourses']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['role:student'])->group(function () {
    Route::get('/course-selector', [CourseController::class, 'ShowCourseSelector'])->name('course.selector');
    Route::get('/courses', [CourseController::class, 'ShowCourses'])->name('courses');
    Route::get('/faq', function () {
        return view('faq');
    });
    Route::get('/contact', [StudentController::class, 'contact'])->name('contact');
    Route::post('/contact', [StudentController::class, 'submit'])->name('contact.submit');
    Route::get('/courses/{id}', [CourseController::class, 'showCoursePage'])->name('courses.page');
    Route::get('/pricing', [StudentController::class, 'showPricing'])->name('pricing');
    Route::post('/select-plan/{id}', [StudentController::class, 'selectPlan'])->name('select.plan');
    Route::post('/courses/{course}/enroll', [StudentController::class, 'enroll'])->name('courses.enroll');

});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::delete('/courses/{course}', [AdminController::class, 'destroy'])->name('admin.courses.destroy');
    Route::post('/courses/{course}/contents', [AdminController::class, 'storeContent'])->name('admin.contents.store');
    Route::post('/courses/{course}/objectives', [AdminController::class, 'storeObjective'])->name('admin.objectives.store');
    Route::post('/courses/{course}/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
    Route::get('/admin/courses/{course}/manage', [AdminController::class, 'manage'])->name('admin.courses.manage');
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::delete('/admin/courses/{course}/contents/{content}', [AdminController::class, 'destroyContent'])
        ->name('admin.contents.destroy');
    Route::delete('/admin/courses/{course}/objectives/{objective}', [AdminController::class, 'destroyObjective'])
        ->name('admin.objectives.destroy');
    Route::delete('/admin/courses/{course}/projects/{project}', [AdminController::class, 'destroyProject'])
        ->name('admin.projects.destroy');
});





