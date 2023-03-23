<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubCategoryController;
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

Route::get('admin/photos/add', [AdminController::class, 'create'])->middleware('admin');
Route::post('admin/photos/add', [AdminController::class, 'store'])->middleware('admin');

Route::get('admin/photos/edit/{post:slug}', [AdminController::class, 'edit'])->middleware('admin');
Route::patch('admin/photos/edit/{post:slug}', [AdminController::class, 'update'])->middleware('admin');
Route::delete('admin/photos/delete/{post:slug}', [AdminController::class, 'destroy'])->middleware('admin');

Route::get('admin/subcategories', [SubCategoryController::class, 'index'])->middleware('admin');
Route::delete('admin/subcategories/delete/{subCategory:slug}', [SubCategoryController::class, 'destroy'])->middleware('admin');
Route::get('admin/subcategories/edit/{subCategory:slug}', [SubCategoryController::class, 'edit'])->middleware('admin');
Route::patch('admin/subcategories/edit/{subCategory:slug}', [SubCategoryController::class, 'update'])->middleware('admin');

Route::get('admin/subcategories/add', [AdminController::class, 'create'])->middleware('admin');
Route::post('admin/subcategories/add', [AdminController::class, 'store'])->middleware('admin');

Route::get('admin', [AdminController::class, 'index'])->middleware('admin');

Route::post('admin/logout', [SessionsController::class, 'destroy'])->middleware('admin');

Route::get('admin/login', [SessionsController::class, 'create'])->middleware('guests');
Route::post('admin/login', [SessionsController::class, 'store'])->middleware('guests');

