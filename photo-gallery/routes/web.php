<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
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

Route::get('/category/{category:slug}', [CategoryController::class, 'index']);

Route::get('admin/photos/add', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/photos/add', [PostController::class, 'store'])->middleware('admin');

Route::get('admin', [AdminController::class, 'index'])->middleware('admin');

Route::post('admin/logout', [SessionsController::class, 'destroy'])->middleware('admin');

Route::get('admin/login', [SessionsController::class, 'create'])->middleware('guests');
Route::post('admin/login', [SessionsController::class, 'store'])->middleware('guests');
