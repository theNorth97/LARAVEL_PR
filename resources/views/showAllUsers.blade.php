<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Все пользователи</title>
</head>

<body>
    <h1>Список пользователей</h1>
    @if (session('success'))
    <div>{{ session('success') }}</div>
    @endif

    @foreach($users as $user)
    <div>
        ID: {{ $user->id }} <br>
        Имя: {{ $user->name }} <br>
        Email: {{ $user->email }} <br>
        Время создания записи: {{ $user->created_at }} <br>

        <a href="{{ route('users.edit', $user->id) }}">Редактировать</a>

        <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Точно удалить?')">Удалить</button>
        </form>

        <hr>
    </div>
    @endforeach
</body>

</html>