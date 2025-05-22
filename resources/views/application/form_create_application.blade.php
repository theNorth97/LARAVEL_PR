<!DOCTYPE html>
<html>

<head>
    <title>Создать заявку</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Создание новой заявки</h1>

    @if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
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

    <form method="POST" action="{{ route('store') }}">
        @csrf

        <label for="service_name">Выберите услугу:</label>
        <select name="service_name" id="service_name" required>
            <option value="electrical">Электромонтажные работы</option>
            <option value="emergency">Аварийная заявка</option>
            <option value="one_time">Обслуживание разово</option>
            <option value="subscription">Обслуживание по подписке</option>
            <option value="other">Другое</option>
        </select>

        <br><br>

        <label for="phone">Телефон:</label>
        <input type="text" name="phone" id="phone" placeholder="Телефон" required><br>

        <label for="description">Описание заявки:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <br><br>

        <button type="submit">Создать заявку</button>
    </form>
</body>

</html>