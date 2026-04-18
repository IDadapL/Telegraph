<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="services.css">
    <title>Услуги</title>
</head>
<body>
    <?php include '../header.php';?>

<main>

    <!-- HERO -->
    <section class="services-hero">
        <h1>Услуги</h1>
        <p>Все возможности системы Телеграф</p>
    </section>

    <!-- УСЛУГИ -->
    <section class="services-container">

        <div class="card">
            <img src="../Convert.png">
            <h3>Отправка телеграммы</h3>
            <p>Быстрая передача сообщений по всему миру.</p>
            <button class="order-form">Заказать</button>
            <span>399 ₽</span>
        </div>

        <div class="card">
            <img src="https://prorisuem.ru/foto/3705/molniia_detskii_risunok_13.webp">
            <h3>Срочная телеграмма</h3>
            <p>Максимальная скорость доставки.</p>
            <button class="order-form">Заказать</button>
            <span>799 ₽</span>
        </div>

        <div class="card">
            <img src="https://png.pngtree.com/png-vector/20241211/ourmid/pngtree-modern-office-building-front-view-design-png-image_14674025.png">
            <h3>Корпоративная связь</h3>
            <p>Массовые рассылки и бизнес-решения.</p>
            <button class="order-form">Заказать</button>
            <span>2699 ₽</span>
        </div>

        <div class="card">
            <img src="../globus.png">
            <h3>Международная телеграмма</h3>
            <p>Отправка сообщений за границу.</p>
            <button class="order-form">Заказать</button>
            <span>599 ₽</span>
        </div>

        <div class="card">
            <img src="https://png.pngtree.com/png-vector/20221019/ourmid/pngtree-blue-cartoon-shield-png-image_6341282.png">
            <h3>Защищённое сообщение</h3>
            <p>Передача данных с шифрованием.</p>
            <button class="order-form">Заказать</button>
            <span>799 ₽</span>
        </div>

        <div class="card">
            <img src="https://png.pngtree.com/png-vector/20250813/ourlarge/pngtree-clock-png-image_17167237.webp">
            <h3>Отложенная отправка</h3>
            <p>Планируйте сообщения заранее.</p>
            <button class="order-form">Заказать</button>
            <span>699 ₽</span>
        </div>

    </section>

</main>

<?php include '../footer.php';?>
<script src="../orderForm.js"></script>

</body>
</html>