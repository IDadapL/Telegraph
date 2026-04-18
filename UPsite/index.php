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
    </main>
    <?php include 'footer.php';?>
    <script src="index.js"></script>
</body>
</html>