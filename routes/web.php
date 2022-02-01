<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClazzController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;

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
<<<<<<< HEAD

Route::resource('students', StudentController::class);

=======
Route::resource('subjects', SubjectController::class );
Route::resource('clazzs', ClazzController::class);
Route::resource('sections', SectionController::class);
>>>>>>> 6c7a58a20ef5aa6f7928987032e3ae165e885c78
