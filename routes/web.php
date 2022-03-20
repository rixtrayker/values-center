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
Route::get('/admin', function () {
    return view('admin.admin-home');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
