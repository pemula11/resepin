<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('recipes', [RecipeController::class, 'index']);
Route::get('recipes/{id}', [RecipeController::class, 'show']);
Route::post('recipes', [RecipeController::class, 'create']);
Route::put('recipes/{id}', [RecipeController::class, 'update']);
Route::delete('recipes/{id}', [RecipeController::class, 'destroy']);