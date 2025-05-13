<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});



Route::get('main', [UserController::class, 'getFormCreateUser']);
Route::post('create/user', [UserController::class, 'CreateUser']);
Route::get('all', [UserController::class, 'getAllUsers'])->name('allUsers');
Route::get('update/form/{id}', [UserController::class, 'UpdateFormUser'])->name('users.edit');
Route::put('update/{id}', [UserController::class, 'UpdateUser'])->name('users.update');
Route::get('', [UserController::class, ''])->name('');
Route::delete('delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
