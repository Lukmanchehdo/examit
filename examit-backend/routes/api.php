<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DevicetController;
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/student', [StudentController::class, 'index']);
Route::post('/student/save', [StudentController::class, 'save']);
Route::post('/student/update', [StudentController::class, 'update']);
Route::post('/student/delete/{id}', [StudentController::class, 'delete']);

Route::get('/device', [DevicetController::class, 'index']);
Route::post('/device/save', [DevicetController::class, 'save']);
Route::post('/device/update', [DevicetController::class, 'update']);
Route::post('/device/delete/{id}', [DevicetController::class, 'delete']);

Route::get('/borrow', [BorrowController::class, 'index']);
Route::get('/borrow_lists/{id}', [BorrowController::class, 'borrow_lists']);

