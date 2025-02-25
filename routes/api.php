<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//test
Route::get('/test', function () {
    return response()->json(['status' => 'success', 'message' => 'This is api for testing']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json(auth()->user());
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/me', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::prefix('v1')->group(function (){
    Route::get('/tags', [TagController::class, 'index']);
    Route::apiResource('posts', PostController::class);
});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    // Route::apiResource('users', 'UserController');
    Route::get('/user', [AuthController::class, 'getUserAuth']);
    Route::post('/logout', [AuthController::class, 'logout']);
});