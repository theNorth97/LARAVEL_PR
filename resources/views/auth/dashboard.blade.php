<!DOCTYPE html>
<html>

<head>
    <title>Личный кабинет</title>
</head>

<body>
    <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>

    <p>Вы вошли в систему</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Выйти</button>
    </form>

    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if (session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
    @endif
</body>

</html>