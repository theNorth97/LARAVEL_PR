<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ЭлектроПро Сервис')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Сюда можно подключить стили --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header,
        section,
        footer {
            padding: 20px;
        }

        h1,
        h2 {
            color: #333;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    @yield('content')

</body>

</html>