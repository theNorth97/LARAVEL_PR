<!DOCTYPE html>
<html>

<head>
    <title>списочек</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Список активных заявок</h1>

    @foreach ($applications as $application)
    <div class="application">
        <div class="application-description">
            <strong>ID:</strong> {{ $application->id }}<br>
            <strong>Услуга:</strong> {{ $application->service_name }}<br>
            <strong>Телефон:</strong> {{ $application->phone }}<br>
            <strong>Описание:</strong> {{ $application->description }}<br>
            <strong>Дата создания:</strong> {{ $application->created_at }}<br>

        </div>
        @can('update', $application)
        <form method="POST" action="{{ route('appfinish', $application->id) }}" style="display:inline;">
            @csrf
            <button type="submit" onclick="return confirm('Точно завершить заявку?')">Завершить</button>
        </form>
        @endcan
        <hr>
    </div>
    @endforeach


    <h1>Список завершенных заявок</h1>

    @foreach ($finishedApplications as $finishedApplication)
    <div class="application">
        <div class="application-description">
            <strong>ID(сделать айди чтобы был тот же что и в активной заявке):</strong> {{ $finishedApplication->id }}<br>
            <strong>Услуга:</strong> {{ $finishedApplication->service_name }}<br>
            <strong>Телефон:</strong> {{ $finishedApplication->phone }}<br>
            <strong>Описание:</strong> {{ $finishedApplication->description }}<br>
            <strong>Дата завершения:</strong> {{ $finishedApplication->update_at }}<br>
        </div>
        <hr>
    </div>
    @endforeach

    <a href="{{ url()->previous() }}">Назад</a>

</body>

</html>