<!DOCTYPE html>

<form method="POST" action=" {{ route('user.create') }}">
    @csrf
    <input type="text" name="name" placeholder="Имя">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Пароль">
    <button>Создать</button>
</form>

<a href="{{ route('allUsers') }}">назад к списку</a>

@if (session('success'))
<div>{{ session('success') }}</div>
@endif