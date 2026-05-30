<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Telegraph</title>
</head>

<body>
    
    <?php include 'header.php';?>

    <main>
        <!-- HERO -->
    <section class="hero">
        <h1>Телеграф</h1>
        <p>Современная система передачи сообщений для бизнеса и частных клиентов</p>
        <div class="hero-buttons">
            <a href="#tariffs"><button>Начать</button></a>
            <a href="#services"><button class="secondary">Услуги</button></a>
        </div>
    </section>

    <!-- УСЛУГИ -->
    <section class="block">
        <h2 id="services">Услуги</h2>
        <div class="cards">

            <div class="card">
                <h3>Отправка телеграммы</h3>
                <p>Быстрая передача сообщений по всему миру с гарантией доставки.</p>
                <button class="service-card">Заказать</button>
            </div>

            <div class="card">
                <h3>Срочная телеграмма</h3>
                <p>Приоритетная доставка для важных и срочных сообщений.</p>
                <button class="service-card">Заказать</button>
            </div>

            <div class="card">
                <h3>Корпоративная связь</h3>
                <p>Решения для бизнеса и массовых рассылок.</p>
                <button class="service-card">Заказать</button>
            </div>

        </div>
    </section>

    <!-- ТАРИФЫ -->
    <section class="block">
        <h2 id="tariffs">Тарифы</h2>
        <div class="cards">

            <div class="card">
                <h3>Старт</h3>
                <p>Для повседневных задач</p>
                <span>499 руб/мес</span>
                <button class="tarif-card">Оформить</button>
            </div>

            <div class="card highlight">
                <h3>Премиум</h3>
                <p>Оптимальный выбор</p>
                <span>1799 руб/мес</span>
                <button class="tarif-card">Оформить</button>
            </div>

            <div class="card">
                <h3>Экспресс</h3>
                <p>Максимальная скорость</p>
                <span>3699 руб/мес</span>
                <button class="tarif-card">Оформить</button>
            </div>

        </div>
    </section>

    <section class="how-it-works">
    <h2>Как это работает</h2>

    <div class="steps">

        <div class="step">
            <img src="https://images.unsplash.com/photo-1567473030492-533b30c5494c?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Отправка">
            <h3>Вы отправляете сообщение</h3>
            <p>Вы выбираете услугу и вводите данные для отправки.</p>
        </div>

        <div class="step">
            <img src="https://images.unsplash.com/photo-1587355760421-b9de3226a046?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Обработка">
            <h3>Система обрабатывает</h3>
            <p>Мы проверяем данные и передаём сообщение в систему доставки.</p>
        </div>

        <div class="step">
            <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?q=80&w=765&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Доставка">
            <h3>Доставка получателю</h3>
            <p>Сообщение доставляется адресату в кратчайшие сроки.</p>
        </div>

    </div>
    </section>

    </main>
    <?php include 'footer.php';?>
    <script src="index.js"></script>
</body>
</html>