<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('front.home');

    Route::prefix('/category')->group(function () {
        Route::get('/{id}', [CourseController::class, 'category'])->name('front.category');
        Route::get('/{id}/course/{cat_id}', [CourseController::class, 'show'])->name('front.show');
    });

    Route::get('/contact', [CountactController::class, 'index'])->name('front.contact');

    Route::prefix('/message')->group(function () {
        Route::post('/newletter', [MessageController::class, 'newsletter'])->name('front.message.newsletter');
        Route::post('/contect', [MessageController::class, 'contect'])->name('front.message.contect');
        Route::post('/enroll', [MessageController::class, 'enroll'])->name('front.message.enroll');
    });
});

Route::prefix('admin/dashboard')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/doLogin', [AuthController::class, 'doLogin'])->name('admin.doLogin');

    Route::middleware('adminAuth:admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin.home');
        Route::prefix('/category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('/update', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

        Route::prefix('/trainer')->group(function () {
            Route::get('/', [TrainerController::class, 'index'])->name('admin.trainer.index');
            Route::get('/create', [TrainerController::class, 'create'])->name('admin.trainer.create');
            Route::post('/store', [TrainerController::class, 'store'])->name('admin.trainer.store');
            Route::get('/edit/{id}', [TrainerController::class, 'edit'])->name('admin.trainer.edit');
            Route::post('/update', [TrainerController::class, 'update'])->name('admin.trainer.update');
            Route::get('/delete/{id}', [TrainerController::class, 'delete'])->name('admin.trainer.delete');
        });

        Route::prefix('/course')->group(function () {
        Route::get('/', [AdminCourseController::class, 'index'])->name('admin.course.index');
        Route::get('/create', [AdminCourseController::class, 'create'])->name('admin.course.create');
        Route::post('/store', [AdminCourseController::class, 'store'])->name('admin.course.store');
        Route::get('/edit/{id}', [AdminCourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/update', [AdminCourseController::class, 'update'])->name('admin.course.update');
        Route::get('/delete/{id}', [AdminCourseController::class, 'delete'])->name('admin.course.delete');
        });

        Route::prefix('/student')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('admin.student.index');
        Route::get('/create', [StudentController::class, 'create'])->name('admin.student.create');
        Route::post('/store', [StudentController::class, 'store'])->name('admin.student.store');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('admin.student.edit');
        Route::post('/update', [StudentController::class, 'update'])->name('admin.student.update');
        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('admin.student.delete');
        });

        Route::prefix('/coursestudent')->group(function () {
            Route::get('/', [CourseStudentController::class, 'index'])->name('admin.coursestudent.index');
            Route::get('/create', [CourseStudentController::class, 'create'])->name('admin.coursestudent.create');
            Route::post('/store', [CourseStudentController::class, 'store'])->name('admin.coursestudent.store');
            Route::get('/edit/{id}', [CourseStudentController::class, 'edit'])->name('admin.coursestudent.edit');
            Route::post('/update', [CourseStudentController::class, 'update'])->name('admin.coursestudent.update');
            Route::get('/delete/{id}', [CourseStudentController::class, 'delete'])->name('admin.coursestudent.delete');
            });
    });
});
