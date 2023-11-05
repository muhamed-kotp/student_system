<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Books: read
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
Route::get('/students/show/{id}', [StudentController::class, 'show'])->name('students.show');

// Books: Create
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
//Books: Edit
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::post('students/update/{id}', [StudentController::class, 'update'])->name('students.update');

//Books: Delete
Route::get('students/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');

//levels

Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
Route::get('/levels/show/{id}', [LevelController::class, 'show'])->name('levels.show');

// lEVEL: Create
Route::get('/levels/create', [LevelController::class, 'create'])->name('levels.create');
Route::post('/levels/store', [LevelController::class, 'store'])->name('levels.store');

//courses

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show');
