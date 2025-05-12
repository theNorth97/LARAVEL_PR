<!DOCTYPE html>

<form method="POST" action="create/user">
    @csrf
    <input type="text" name="name" placeholder="Имя">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Пароль">
    <button>Создать</button>
</form>

@if (session('success'))
<div>{{ session('success') }}</div>
@endif