<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ClazzController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TeacherController;
use Mockery\Generator\Parameter;

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
//default rote wlecome page
Route::get('/', function () {
    return view('welcome');

});
//for student
Route::resource('student', StudentController::class, [ 'parameters' => [
    'student' => 'student:slug'
]]);

//for subject
Route::resource('subject', SubjectController::class, [ 'parameters' => [
    'subject' => 'subject:slug'
]]);

// for attenndance
Route::get('present',[ AttendanceController::class, 'present'])->name('present');
Route::get('absent', [AttendanceController::class, 'absent' ])->name('absent');
Route::resource('attendance', AttendanceController::class );

//for classes
Route::resource('clazz', ClazzController::class, [ 'parameters' => [
    'clazzs' => 'clazzs:slug'
]]);
//for section
Route::resource('sections', SectionController::class);
//auth route
Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//for teacher
Route::resource('teacher', TeacherController::class, [ 'parameters' => [
    'teacher' => 'teacher:slug'
]]);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//for users route
Route::resource('user', UserController::class, [ 'parameters' => [
    'user' => 'user:slug'
]]);
