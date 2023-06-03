<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShowcaseController;
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

Route::get('/', [FeaturedController::class, 'index']);
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

Route::get('admin/subcategories/add', [SubCategoryController::class, 'create'])->middleware('admin');
Route::post('admin/subcategories/add', [SubCategoryController::class, 'store'])->middleware('admin');

Route::get('admin', [AdminController::class, 'index'])->middleware('admin');

Route::post('admin/logout', [SessionsController::class, 'destroy'])->middleware('admin');

Route::get('admin/login', [SessionsController::class, 'create'])->middleware('guests');
Route::post('admin/login', [SessionsController::class, 'store'])->middleware('guests');

Route::post('/contact', [ContactController::class, 'store']);

Route::get('/client-showcase', [ShowcaseController::class, 'index']);
Route::get('/admin/showcase', [ShowcaseController::class, 'admin'])->middleware('admin');
Route::get('/admin/showcase/add', [ShowcaseController::class, 'create'])->middleware('admin');
Route::post('/admin/showcase/add', [ShowcaseController::class, 'store'])->middleware('admin');
Route::get('/admin/showcase/edit/{showcase:slug}', [ShowcaseController::class, 'edit'])->middleware('admin');
Route::patch('/admin/showcase/edit/{showcase:slug}', [ShowcaseController::class, 'update'])->middleware('admin');
Route::delete('admin/showcase/delete/{showcase:slug}', [ShowcaseController::class, 'destroy'])->middleware('admin');

