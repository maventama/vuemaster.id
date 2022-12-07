<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [HomeController::class, 'register']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/process_login', [HomeController::class, 'process_login'])->name('process_login');
Route::post('/process_register', [HomeController::class, 'process_register'])->name('process_register');


Route::group(['middleware' => 'auth:web'], function(){
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/course/{id}', [CourseController::class, 'course']);
    Route::post('/mark_as_done', [CourseController::class, 'mark_as_done']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/process_update_profile', [ProfileController::class, 'process_update_profile']);
    Route::post('/process_update_password', [ProfileController::class, 'process_update_password']);
    Route::post('/logout', [ProfileController::class, 'logout']);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

