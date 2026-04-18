<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="auth.css">
    <title>Авторизация</title>
</head>

<body>
    <?php include '../header.php';?>

<main>

    <section class="auth-wrapper">

        <form id="logForm" method="post" action="../register.php">

            <h1 id="authHeader">Регистрация</h1>

            <div class="formCont">
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div class="formCont">
                <label>Логин</label>
                <input type="text" name="username">
            </div>

            <div class="formCont">
                <label>Пароль</label>
                <input type="password" name="password">
            </div>

            <button type="submit" id="authButton">Зарегистрироваться</button>

            <div class="auth-switch">
                <a href="#" id="registration-switch">Регистрация</a>
                <span>•</span>
                <a href="#" id="login-switch">Вход</a>
            </div>
            <input type="hidden" id="mode" name="mode" value="register">

        </form>

    </section>

</main>

<?php include '../footer.php';?>

    <script src="login.js"></script>
</body>
</html>