<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\CourseOfferController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\AdminEnrollController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherEnrollController;


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


/* This route for web page here*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/all-courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/courses-detail/{id}', [HomeController::class, 'detail'])->name('courses-detail');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/login-registration', [HomeController::class, 'auth'])->name('login-registration');
/* End route for web page*/

Route::post('/student/login', [StudentAuthController::class, 'login'])->name('student.login');
Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/student/course', [StudentDashboardController::class, 'course'])->name('student.course');
    Route::get('/student/profile', [StudentDashboardController::class, 'profile'])->name('student.profile');
    Route::post('/student/update/student/{id}', [StudentDashboardController::class, 'updateStudent'])->name('update.student');
    Route::get('/student/logout', [StudentAuthController::class, 'logout'])->name('student.logout');
});


Route::get('/teacher/login', [TeacherAuthController::class, 'login'])->name('teacher.login');
Route::post('/teacher/login', [TeacherAuthController::class, 'loginCheck'])->name('teacher.login');
Route::middleware('teacher')->group(function () {
    Route::post('/teacher/logout', [TeacherAuthController::class, 'logout'])->name('teacher.logout');
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    Route::get('/course/add', [CourseController::class, 'add'])->name('course.add');
    Route::get('/course/manage', [CourseController::class, 'manage'])->name('course.manage');
    Route::post('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/course/detail/{id}', [CourseController::class, 'detail'])->name('course.detail');
    Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('/course/delete/{id}', [CourseController::class, 'delete'])->name('course.delete');
    Route::get('/teacher/enroll/manage', [TeacherEnrollController::class, 'manage'])->name('teacher.enroll.manage');
});


Route::get('/enroll-now/{id}', [EnrollController::class, 'index'])->name('enroll-now');
Route::post('/enroll.newStudent/{id}', [EnrollController::class, 'enrollStudent'])->name('enroll.newStudent');


Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/teacher/add', [TeacherController::class, 'index'])->name('teacher.add');
    Route::get('/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('/teacher/manage', [TeacherController::class, 'manage'])->name('teacher.manage');
    Route::post('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');

    Route::get('/admin/manage-course', [AdminCourseController::class, 'manageCourse'])->name('admin.manage-course');
    Route::get('/admin/course-detail/{id}', [AdminCourseController::class, 'CourseDetail'])->name('admin.course-detail');
    Route::get('/admin/update-course-status/{id}', [AdminCourseController::class, 'updateStatus'])->name('admin.update-course-status');
    Route::get('/admin/manage-course-offer', [AdminCourseController::class, 'manageOffer'])->name('admin.manage-course-offer');
    Route::post('/admin/create-course-offer', [AdminCourseController::class, 'createOffer'])->name('admin.create-course-offer');
    Route::get('/admin/edit-course-offer/{id}', [AdminCourseController::class, 'editOffer'])->name('admin.edit-course-offer');
    Route::post('/admin/update-course-offer', [AdminCourseController::class, 'updateOffer'])->name('admin.update-course-offer');
    Route::get('/admin.manage.enroll', [AdminEnrollController::class, 'manage'])->name('admin.manage.enroll');
    Route::get('/admin.update-enroll-status/{id}', [AdminEnrollController::class, 'updateEnroll'])->name('admin.update-enroll-status');
});



Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
Route::resource('category', CategoryController::class);
