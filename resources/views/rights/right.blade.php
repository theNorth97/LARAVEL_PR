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

    @if (session('success'))
    <div style="color:green;"> {{ session('success') }}
    </div>
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

    <form method="POST" action="{{ route('rights') }}">
        @csrf

        <label for="right_name">Выберите права:</label>
        <select name="right_name" id="right_name" required>
            <option value="can_create_apppllication">can_create_apppllication</option>
            <option value="can_delete_apppllication">can_delete_apppllication</option>
            <option value="can_view_apppllications">can_view_apppllications</option>
            <option value="can_accept_apppllication_in_work">can_accept_apppllication_in_work</option>
            <option value="can_complete_apppllication">can_complete_apppllication</option>
            <option value="can_leave_a_review_apppllication">can_leave_a_review_apppllication</option>
        </select>

        <label for="phone">ID юзера:</label>
        <input type="text" name="ID" id="ID" placeholder="ID" required><br>

        <button type="submit">Установить права</button>

    </form>
    <a href="{{ url()->previous() }}">Назад</a>

</body>

</html>