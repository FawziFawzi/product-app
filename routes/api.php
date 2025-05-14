<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
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
//Admin Authentication
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// Product Crud
Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('api.products.show');
Route::middleware('auth:admin')->group(function () {
    Route::Post('/products', [ProductController::class, 'store'])->name('api.products.store');
    Route::Put('/products/{id}', [ProductController::class, 'update'])->name('api.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('api.products.destroy');
});

