<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="contacts.css">
    <title>Контакты</title>
</head>

<body>
    
<?php include '../header.php';?>

<main>

    <!-- HERO -->
    <section class="contacts-hero">
        <h1>Контакты</h1>
        <p>Свяжитесь с нами любым удобным способом</p>
    </section>

    <!-- КОНТЕНТ -->
    <section class="contacts-container">

        <div class="contact-card">
            <h3>Основная информация</h3>
            <p>📞 +7-(937)-508-00-00</p>
            <p>📧 Telegraph@gmail.com</p>
            <p>🛠 support@telegraph.ru</p>
        </div>

        <div class="contact-card">
            <h3>Адрес</h3>
            <p>📍 г. Москва, ул. Веселая, д. 2033</p>
            <p>📍 г. Санкт-Петербург, ул. Комсомольская, д. 508</p>
        </div>

        <div class="contact-card">
            <h3>Социальные сети</h3>
            <a href="#">VK</a>
            <a href="#">Telegram</a>
            <a href="#">Discord</a>
        </div>

    </section>

</main>
<?php include '../footer.php';?>
</body>
</html>