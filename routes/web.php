<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthenticatesController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CatcherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EduCenterController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VCashController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/private-image/{image}', function ($image) {
    $file = Storage::path('payment-images/'.$image);
    return response()->file($file);
})->name('private-images');

Route::get('/admin', function () {
    return view('admin.admin-home');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('student-lecture', [StudentController::class, 'updateStudentLectures'])->name('students.lecture.get');
Route::get('student-lecture/{student}', [StudentController::class, 'chooseStudent'])->name('student.lecture.get');
Route::post('student-lecture/{student?}', [StudentController::class, 'attachLecturesPost'])->name('student.lecture.post');

// Route::post('student-lecture-next', [StudentController::class, 'attachLecturesGet'])->name('student-lecture-page');

Route::post('post-attendance', [AttendanceController::class, 'postAttendance'])->name('post.attendance');
Route::post('take-attendance', [AttendanceController::class, 'takeAttendance'])->name('take.attendance');

// admin
Route::resource('educenters', EduCenterController::class);
Route::resource('banks', BankController::class);
Route::resource('vcashes', VCashController::class);
Route::resource('payments', PaymentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('registrations', RegistrationController::class);
Route::resource('authenticates', AuthenticatesController::class);
Route::resource('settings', SettingController::class);
Route::resource('refunds', RefundController::class);
Route::resource('students', StudentController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('catchers', CatcherController::class);
Route::resource('lectures', LectureController::class);
Route::resource('courses', CourseController::class);
