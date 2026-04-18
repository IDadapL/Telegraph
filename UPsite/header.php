<?php session_start();?>

<header class="header">

    <div class="header-top">
        <div class="logo">
            <a href="http://UPsite/index.php"><img src="/telegraphLogo.png" alt=""></a>
            <span>Telegraph</span>
        </div>

        <div class="header-right">
            <?php if(isset($_SESSION['user_id'])):?>
                <a href="http://UPsite/logout.php" class="auth-link">Выход</a>
            <?php else: ?>
        <a href="http://UPsite/Auth/auth.php" class="auth-link">Авторизация</a>
            <?php endif;?>
        <div class="search">
            
        </div>
        </div>
    </div>

    <div class="header-bottom">
        <nav class="nav">
            <a href="http://UPsite/index.php">Главная</a>
            <a href="http://UPsite/Services/services.php">Услуги</a>
            <a href="http://UPsite/Tariffs/tariffs.php">Тарифы</a>
            <a href="http://UPsite/Contacts/contacts.php">Контакты</a>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'):?>
            <a href="http://UPsite/Admin/admin.php">Админ-панель</a>
            <?php endif;?>
        </nav>
    </div>

</header>