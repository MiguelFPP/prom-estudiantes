<?php

use App\Http\Controllers\AverageController;
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
