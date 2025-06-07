<!DOCTYPE html>
<html>

<head>
    <title>Личный кабинет</title>
</head>

<body>
    <h1>Добро пожаловать, {{ Auth::user()->name }}!</h1>

    <p>Вы вошли в систему</p>

    @can('create', App\Models\ActiveRequest::class)
    <button><a href="{{ route('appForm') }}" class="btn">Создать заявку!</a></button>
    @endcan

    @can('view', App\Models\ActiveRequest::class)
    <button><a href="{{ route('appIndex') }}"> история заявок!</a></button>
    @endcan

    <button><a href="{{ route('rightForm') }}"> права</a></button>

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
    <div style="color:green;"> {{ session('success') }}
    </div>
    @endif

    @if(session('warning'))
    <div style="color:orange;">{{ session('warning') }}</div>
    @endif

</body>