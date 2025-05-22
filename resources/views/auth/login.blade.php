<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>

<body>
    <h1>Вход в аккаунт</h1>

    @if (session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Войти</button>

    </form>

    <button><a href="{{ route('regForm') }}"> регистрация</a></button>
</body>

</html>