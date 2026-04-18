<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="tariffs.css">
    <title>Тарифы</title>
</head>
<body>
    <?php include '../header.php';?>

<main>

    <!-- HERO -->
    <section class="tariffs-hero">
        <h1>Тарифы</h1>
        <p>Выберите план, который подходит вам</p>
    </section>

    <!-- ТАРИФЫ -->
    <section class="tariffs-container">

        <div class="card">
            <h3>Старт</h3>
            <span>499 ₽ / мес</span>
            <p>Базовый тариф для повседневных задач.</p>
            <button class="order-form">Оформить</button>
        </div>

        <div class="card highlight">
            <h3>Премиум</h3>
            <span>1799 ₽ / мес</span>
            <p>Оптимальный выбор для большинства пользователей.</p>
            <button class="order-form">Оформить</button>
        </div>

        <div class="card">
            <h3>Экспресс</h3>
            <span>3699 ₽ / мес</span>
            <p>Максимальная скорость доставки сообщений.</p>
            <button class="order-form">Оформить</button>
        </div>

        <div class="card">
            <h3>Ультра</h3>
            <span>4799 ₽ / мес</span>
            <p>Расширенные возможности и повышенные лимиты.</p>
            <button class="order-form">Оформить</button>
        </div>

        <div class="card">
            <h3>Бизнес</h3>
            <span>6799 ₽ / мес</span>
            <p>Для команд и корпоративного использования.</p>
            <button class="order-form">Оформить</button>
        </div>

        <div class="card">
            <h3>Безлимит</h3>
            <span>9999 ₽ / мес</span>
            <p>Полный доступ без ограничений.</p>
            <button class="order-form">Оформить</button>
        </div>

    </section>

</main>
<?php include '../footer.php';?>
<script src="../orderForm.js"></script>
</body>
</html>