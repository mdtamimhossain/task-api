<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



    Route::get('/test', function () {
        return response()->json([
            'success' => true,
            'message' => "Success"
        ]);
    });
Route::middleware('auth:api')->prefix('/task')->group(function (){
    Route::get('/', [TaskController::class, 'getList']);
    Route::POST('/store', [TaskController::class, 'store']);
    Route::get('/{id}',[TaskController::class, 'getTask']);
    Route::POST('/update',[TaskController::class,'updateTask']);
    Route::get('/delete/{id}', [TaskController::class, 'deleteTask']);
    Route::get('/logout',[TaskController::class,'logout']);
});




Route::post('/register', [AuthController::class, 'register']);
Route::POST('/login', [AuthController::class, 'login']);

