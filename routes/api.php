<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\UserController;
use App\Models\Food;


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

Route::get("/foods", [FoodController::class, "index"]);
Route::get("/foods/{id}", [FoodController::class, "show"]);

Route::get("/users", [UserController::class, "index"]);
Route::get("/uders/{id}", [UserController::class, "show"]);