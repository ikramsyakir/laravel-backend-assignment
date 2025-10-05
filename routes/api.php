<?php

use App\Http\Controllers\PasswordGenerateController;
use App\Http\Controllers\PizzaOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('password/generate', PasswordGenerateController::class)->name('password.generate');
Route::get('order/pizza', PizzaOrderController::class)->name('order.pizza');
