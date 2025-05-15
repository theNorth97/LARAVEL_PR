<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('create/form', [UserController::class, 'getFormCreateUser'])->name('create.form');
    Route::post('create/user', [UserController::class, 'CreateUser'])->name('create');
});



Route::prefix('update')->name('update.')->group(function () {
    Route::get('update/form/{id}', [UserController::class, 'UpdateFormUser'])->name('users.edit');
    Route::put('update/{id}', [UserController::class, 'UpdateUser'])->name('user');
});

Route::get('allUsers', [UserController::class, 'getAllUsers'])->name('allUsers');
Route::delete('delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
Route::get('', [UserController::class, ''])->name('');
