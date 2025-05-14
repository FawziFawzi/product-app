<?php

use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Authentication
Route::middleware('guest:web')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'show'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

});
    // CRUD management
    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



Route::middleware('auth:web')->group(function () {
    // CRUD management
    Route::get('admin/products/add', [ProductController::class, 'create']);
    Route::post('admin/products/store', [ProductController::class, 'store'])->name('products.store');

    Route::get('admin/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');;
    Route::put('admin/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('admin/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


    // LOGOUT A USER
    Route::delete('/logout', [AuthController::class, 'destroy'])->name('destroy');
});




