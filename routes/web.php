<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/contact', [HomeController::class, 'makeForm']);

Route::post('/contact', [HomeController::class, 'store']);

Route::prefix('/users')->name('users.')->controller(UserController::class)->group(function () {

    Route::get('', [UserController::class, 'index'])->name('listUser');
    Route::get('/add', [FormController::class, 'formUser']);
    Route::post('/add', [UserController::class, 'createUser'])->name('createUser');
    Route::get('/{id}', [UserController::class, 'show']);
    Route::patch('/{id}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('deleteUser');

});

Route::prefix('/posts')->name('posts.')->controller(PostController::class)->group(function () {

    Route::get('', [PostController::class, 'index'])->name('listPost');
    Route::get('/add', [FormController::class, 'formPost']);
    Route::post('/add', [PostController::class, 'store'])->name('createPost');
    Route::get('/{id}', [PostController::class, 'show']);
    Route::patch('/{id}', [PostController::class, 'update'])->name('updatePost');
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('deletePost');

});
