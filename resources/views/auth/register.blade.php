<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>

<form method="POST" action=" {{ route('register') }}">
    @csrf
    <input type="text" name="name" id="name" placeholder="Имя">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Пароль">
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Пароль">

    <button>Создать</button>
</form>

<a href="{{ route('allUsers') }}">назад к списку</a>

@if (session('success'))
<div>{{ session('success') }}</div>
@endif