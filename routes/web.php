<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CarsOperationsController;

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

Route::get('/', function () {return view('welcome');});

// Route::get('/users', [UsersController::class, 'index'])->name('users.index');
// Route::post('/users', [UsersController::class, 'store']);
// Route::get('/users/{users}', [UsersController::class, 'show']);
// Route::put('/users/{users}', [UsersController::class, 'update']);
// Route::delete('/users/{users}', [UsersController::class, 'destroy']);

// Route::get('/cars', [CarsController::class, 'index']);
// Route::post('/cars', [CarsController::class, 'store']);
// Route::get('/cars/{cars}', [CarsController::class, 'show']);
// Route::put('/cars/{cars}', [CarsController::class, 'update']);
// Route::delete('/cars/{cars}', [CarsController::class, 'destroy']);

// Route::get('/cars_operations', [CarsOperationsController::class, 'index']);
// Route::post('/cars_operations', [CarsOperationsController::class, 'store']);
// Route::get('/test', [CarsController::class, 'test']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
