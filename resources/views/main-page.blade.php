@extends('layouts.main')

@section('title', 'Главная страница')

@section('content')
<header style="text-align: center; padding: 20px;">
    <h1>⚡ ЭлектроПро Сервис</h1>
    <p>Профессиональные электромонтажные услуги</p>

    <div style="margin-top: 15px;">

        <a href="#">Вход</a> |
        <a href="#">Регистрация</a>
    </div>
</header>

<section style="padding: 20px;">
    <h2>Новости и акции</h2>
    <ul>
        <li>🔥 Скидка 10% на установку розеток в мае!</li>
        <li>🛠️ Новое оборудование уже в работе!</li>
    </ul>
</section>

<section style="padding: 20px;">
    <h2>Услуги</h2>
    <ul>
        <li>Установка розеток и выключателей</li>
        <li>Прокладка электропроводки</li>
        <li>Сборка щитов и автоматов</li>
        <li>Диагностика и ремонт</li>
    </ul>
</section>

<section style="padding: 20px;">
    <h2>Портфолио</h2>
    <p>Скоро здесь появятся фотографии выполненных работ</p>
</section>

<section style="padding: 20px;">
    <h2>Контакты</h2>
    <p>Email: support@electropro.ru</p>
    <p>Телефон: +7 (999) 123-45-67</p>
</section>

<section style="padding: 20px;">
    <h2>О нас</h2>
    <p>Мы — команда профессионалов, предоставляющих качественные электромонтажные услуги с гарантией. Работаем по всему региону и всегда на связи.</p>
</section>

<footer style="text-align: center; padding: 20px; background: #f0f0f0;">
    <p>&copy; {{ date('Y') }} ЭлектроПро Сервис. Все права защищены.</p>
</footer>
@endsection