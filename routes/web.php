<?php

use App\Http\Controllers\application\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Right\RightController;

Route::get('/', function () {
    return view('welcome');
});


// *** Главный контроллер(UserController) ***
Route::prefix('update')->name('update.')->group(function () {
    // Отображение формы(view) (обновления информации пользователя).
    Route::get('update/form/{id}', [UserController::class, 'UpdateFormUser'])->name('users.edit');
    // Обработка - (PUT) (обновления информации пользователя).
    Route::put('update/{id}', [UserController::class, 'UpdateUser'])->name('user');
});


// *** Контроллер Регистрации(RegisterController) ***
Route::get('register/form', [RegisterController::class, 'showRegisterForm'])->name('regForm'); // Отображение формы(view) (Регистарации пользователя).
Route::post('register', [RegisterController::class, 'register'])->name('register'); // Обработка - (POST) (Регистрация пользователя).


// *** Контроллер Аунтификации(LoginController) ***
Route::get('login/form', [LoginController::class, 'showLoginForm'])->name('LogForm');
Route::post('login', [LoginController::class, 'login'])->name('login'); // Обработка - (POST) (вход в личный кабинет пользователя (Аунтификация)).
Route::post('logout', [LogoutController::class, 'logout'])->name('logout'); // Обработка - (POST) (выход в личного кабинета пользователя).

// *** Отображение формы(view) (Личного кабинета пользователя). ***
Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth')->name('dashboard');

// *** Маршрут главной страницы сайта (main-page) ***
Route::get('mainPage', [UserController::class, 'mainPageView'])->name('mainPage');

// *** Контроллер заявок(ApplicationController) ***
Route::get('application/form', [ApplicationController::class, 'showCreateForm'])->name('appForm'); // Отображение формы(view) (создание заявки).
Route::post('application/create', [ApplicationController::class, 'store'])->name('store'); // Обработка - (POST) (создание заявки). 
Route::get('application/index', [ApplicationController::class, 'index'])->name('appIndex'); // Отображение формы(view) (список всех активных заявок).
Route::post('application/{id}/finish', [ApplicationController::class, 'finish'])->name('appfinish'); // Обработка - (POST) (завершение заявки).

// *** Контроллер прав (ApplicationController) ***
// Route::get('rights/search/form', [RightController::class, 'showFormSearchRights'])->name('searchForm'); // Отображение формы(view) (поиск прав).
Route::post('rights/search', [RightController::class, 'search'])->name('search'); // Обработка - (POST) (Поиск прав).
Route::get('rights/form', [RightController::class, 'showRightForm'])->name('rightForm'); // Отображение формы(view) (установка прав).
Route::post('rights', [RightController::class, 'AddRight'])->name('AddRight'); // Обработка - (POST) (Установка прав).
Route::post('user/{user}/right/{right}/finish', [RightController::class, 'rightFinish'])->name('rightFinish'); // Обработка - (POST) (Удаление права).
