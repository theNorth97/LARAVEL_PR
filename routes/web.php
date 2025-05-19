<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

// *** Маршрут главной страницы сайта (main-page) ***
Route::get('mainPage', [UserController::class, 'mainPageView'])->name('mainPage');



// *** Главный контроллер(UserController) ***

// Группа маршрутов для работы с пользователями(тестовый crud)
Route::prefix('user')->name('user.')->group(function () {
    // Отображение формы(view) (создания нового пользователя).

    Route::get('create/form', [UserController::class, 'getFormCreateUser'])->name('create.form');
    // Обработка - (POST) (создание нового пользователя).
    Route::post('create/user', [UserController::class, 'CreateUser'])->name('create');
});
Route::prefix('update')->name('update.')->group(function () {
    // Отображение формы(view) (обновления информации пользователя).
    Route::get('update/form/{id}', [UserController::class, 'UpdateFormUser'])->name('users.edit');

    // Обработка - (PUT) (обновления информации пользователя).
    Route::put('update/{id}', [UserController::class, 'UpdateUser'])->name('user');
});

// Отображение формы(view) (Списка всех пользователей).
Route::get('allUsers', [UserController::class, 'getAllUsers'])->name('allUsers');

// Обработка формы - (DELETE) (Удаления пользователя).
Route::delete('delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');





// *** Контроллер Регистрации(RegisterController) ***

// Отображение формы(view) (Регистарации пользователя).
Route::get('register/form', [RegisterController::class, 'showRegisterForm'])->name('regForm');
// Обработка - (POST) (Регистрация пользователя).
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', [RegisterController::class, ''])->name(''); // Маршрут вью (логин)
Route::get('login', [RegisterController::class, ''])->name(''); // Маршрут обработка(логин)

Route::get('login', [RegisterController::class, ''])->name(''); // Маршрут дашборд
