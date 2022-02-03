<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClazzController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SigninController;
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
Route::resource('signin', signinController::class);
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class );
Route::resource('clazzs', ClazzController::class);
Route::resource('sections', SectionController::class);
Route::resource('signups', SignupController::class);
