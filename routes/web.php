<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('user', [UserController::class, 'showFormCreateUser']);
Route::post('create/user', [UserController::class, 'createUser']);

Route::get('all', [UserController::class, 'showAllUsers'])->name('showAllUsers');
