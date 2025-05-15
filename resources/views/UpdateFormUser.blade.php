<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Редактировать пользователя</title>
</head>

<body>

    <h2>Редактировать пользователя</h2>

    @if (session('success'))
    <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('update.user', $user->id) }}">
        @csrf
        @method('PUT')

        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        <br><br>

        <button type="submit">Сохранить</button>

        <a href="{{ route('allUsers') }}">назад к списку</a>
    </form>

</body>


</html>