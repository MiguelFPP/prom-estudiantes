<?php

use App\Http\Controllers\AverageController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [AverageController::class, 'index'])->name('averages.index');
Route::get('/averages/create', [AverageController::class, 'create'])->name('averages.create');
Route::get('/averages/edit/{average}', [AverageController::class, 'edit'])->name('averages.edit');

/* students */
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
