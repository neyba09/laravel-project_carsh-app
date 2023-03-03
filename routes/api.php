<?php

use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\CarsDvsTypesController;
use App\Http\Controllers\Api\CarsMarksController;
use App\Http\Controllers\Api\CarsModelsController;
use App\Http\Controllers\Api\CarsOperationsController;
use App\Http\Controllers\Api\CarsStatusesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\UsersStatusesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'users' => UsersController::class,
    'cars' => CarsController::class,
    'dvstype' => CarsDvsTypesController::class,
    'carsmarks' => CarsMarksController::class,
    'carsmodels' => CarsModelsController::class,
    'carsoperations' => CarsOperationsController::class,
    'carsstatuses' => CarsStatusesController::class,
    'usersstatuses' => UsersStatusesController::class,
]);

