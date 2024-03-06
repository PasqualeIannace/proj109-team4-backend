<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RestaurantTypeController;
use App\Http\Controllers\Api\OrdersController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/foods", [FoodController::class, "index"]);
Route::get("/foods/{id}", [FoodController::class, "show"]);

Route::get("/users", [UserController::class, "index"]);
Route::get("/users/{id}", [UserController::class, "show"]);

Route::get('/foods/user/{userId}', [FoodController::class, 'getByUser']);

Route::get("/restaurant_types", [RestaurantTypeController::class, "index"]);

Route::get('/orders/generate', [OrdersController::class, 'generate']);
Route::post('/orders/make/payment', [OrdersController::class, 'makePayment']);
