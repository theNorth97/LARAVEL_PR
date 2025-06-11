<!DOCTYPE html>
<html>

<head>
    <title>Установка прав пользователю</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Установка прав пользователю</h1>

    @if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
    @endif

    @if(session('warning'))
    <div style="color:orange">{{ session('warning') }}</div>
    @endif

    @if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('search') }}">
        @csrf
        <label for="id">ID юзера:</label>
        <input type="text" name="id" id="id" placeholder="id" required><br>

        <button type="submit">Проверить права</button>

    </form>

    <br>
    <a href="{{ url()->previous() }}">Назад</a>

</body>

</html>