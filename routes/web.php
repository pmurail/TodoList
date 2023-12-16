<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\UsersController;
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

Route::prefix('/users')->name('users.')->controller(UsersController::class)->group(function () {

    Route::get('', [UsersController::class, 'index'])->name('listUser');
    Route::get('/add', [FormController::class, 'formUser']);
    Route::post('/add', [UsersController::class, 'createUser']);
    Route::get('/{id}', [UsersController::class, 'show']);
    Route::patch('/{id}', [UsersController::class, 'update'])->name('updateUser');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('deleteUser');

});

Route::prefix('/tag')->name('users.')->controller(UsersController::class)->group(function () {

    Route::get('', [UsersController::class, 'index'])->name('listUser');
    Route::get('/add', [FormController::class, 'formUser']);
    Route::post('/add', [UsersController::class, 'createUser']);
    Route::get('/{id}', [UsersController::class, 'show']);
    Route::patch('/{id}', [UsersController::class, 'update'])->name('updateUser');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('deleteUser');

});
