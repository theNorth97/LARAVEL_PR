<h2>Права пользователя: {{ $user->name }}</h2>
<ul>
    @foreach($rights as $right)
    <li>{{ $right->name }}</li>
    <form method="POST" action="{{ route('rightFinish', ['user' => $user->id, 'right' => $right->id]) }}" style="display:inline;">
        @csrf
        <button type="submit" onclick="return confirm('Точно удалить право?')">Удалить</button>
        <hr>
        @endforeach
</ul>

<h2>Добавить права: {{ $user->name }}</h2>
<form method="POST" action="{{ route('rights') }}">
    @csrf

    <input type="hidden" name="user_id" value="{{ $user->id }}">

    <label for="right_name">Выберите права:</label>
    <select name="right_name" id="right_name" required>
        <option value="can_create_apppllication">can_create_apppllication</option>
        <option value="can_delete_apppllication">can_delete_apppllication</option>
        <option value="can_view_apppllications">can_view_apppllications</option>
        <option value="can_accept_apppllication_in_work">can_accept_apppllication_in_work</option>
        <option value="can_complete_apppllication">can_complete_apppllication</option>
        <option value="can_leave_a_review_apppllication">can_leave_a_review_apppllication</option>
    </select>
    <br>

    <button type="submit">Добавить право</button>

</form>
<a href="{{ url()->previous() }}">Назад</a>