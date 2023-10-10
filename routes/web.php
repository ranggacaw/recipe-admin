<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Rccipe
Route::get('/recipe', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipe.index');
Route::get('/recipe-edit/{id}', [App\Http\Controllers\RecipeController::class, 'edit'])->name('recipe.edit');
Route::post('/recipe-edit-store/{id}', [App\Http\Controllers\RecipeController::class, 'editStore'])->name('recipe.edit.store');
Route::get('/recipe-create', [App\Http\Controllers\RecipeController::class, 'create'])->name('recipe.create');
Route::post('/recipe-create-store', [App\Http\Controllers\RecipeController::class, 'createStore'])->name('recipe.create.store');
Route::delete('/recipe/{id}', [App\Http\Controllers\RecipeController::class, 'delete']);

// User
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user-edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user-edit-store/{id}', [App\Http\Controllers\UserController::class, 'editStore'])->name('user.edit.store');
Route::get('/user-create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user-create-store', [App\Http\Controllers\UserController::class, 'createStore'])->name('user.create.store');
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'delete']);

// About
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::post('/about-store', [App\Http\Controllers\AboutController::class, 'indexStore'])->name('about.index.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
