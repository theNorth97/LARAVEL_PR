<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Все пользователи</title>
</head>

<body>
    <h1>Список пользователей</h1>

    @foreach($users as $user)
    <div>
        ID: {{ $user->id }} <br>
        Имя: {{ $user->name }} <br>
        Email: {{ $user->email }} <br>
        <hr>
    </div>
    @endforeach
</body>

</html>