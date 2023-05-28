<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
<<<<<<< HEAD
  
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
     
// Route::middleware('auth:sanctum')->group(function () {
//     Route::posts('/logout', [AuthController::class, 'logout']);
//     Route::apiResource('/todos', TodoController::class);
//     return $request->user();
// });
=======

Route::middleware('auth:sanctum')->group(function () {
    Route::posts('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/todos', TodoController::class);
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
>>>>>>> d7969669304d502c7c4188283e2084b60ece646c
