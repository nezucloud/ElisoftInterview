<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\IsUserLogin;

use App\Http\Controllers\UserController;
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

Route::get('/', [AdminController::class, 'index']);

Route::middleware([IsUserLogin::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/user-management', [UserController::class, 'index']);
    Route::post('/user-management', [UserController::class, 'create']);
    Route::patch('/user-management', [UserController::class, 'update']);
    Route::post('/user-management/delete', [UserController::class, 'delete']);
    Route::get('/fetch-api-account', [AdminController::class, 'fetchApiAccount']);
    Route::get('/fetch-api-users', [UserController::class, 'fetchUsers']);
    Route::get('/variable-swap', [AdminController::class, 'variableSwap']);
    Route::get('/number-to-words', [AdminController::class, 'numberToWords']);
});

Route::match(['get', 'post'], '/register', [AuthController::class, 'register']);
Route::match(['get', 'post'], '/login', [AuthController::class, 'login']);
Route::match(['get'], '/logout', [AuthController::class, 'logout']);
