<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: http://UPsite/Auth/auth.php");
        $_SESSION['toast'] = "Пожалуйста, авторизуйтесь";
        exit;
    }

    include '../db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="order.css">
    <title>Оформление заказа</title>
</head>

<body>

<?php include '../header.php';?>

<main>

    <section class="auth-wrapper">

        <form id="orderForm" method="post" action="orderManager.php">

            <h1 id="authHeader">Оформление заказа</h1>

            <div class="order-tabs">
                <a href="?type=service" class="<?= ($_GET['type'] ?? 'service') === 'service' ? 'active' : '' ?>">Услуга</a>
                <span>•</span>
                <a href="?type=tariff" class="<?= ($_GET['type'] ?? '') === 'tariff' ? 'active' : '' ?>">Тариф</a>
            </div>

            <div class="formCont">
                <label>Тип услуги</label>

            <?php
                $type = $_GET['type'] ?? 'service';
                $stmt = $pdo->prepare("SELECT id, name FROM services WHERE type = ?");
                $stmt->execute([$type]);
                $services = $stmt->fetchAll();
            ?>
            <select name="service_id">
                <?php foreach ($services as $s): ?>
                    <option value="<?= $s['id'] ?>">
                        <?= $s['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            </div>

            <?php if($type == 'service'): ?>
            <div class="formCont">
                <label>Текст сообщения</label>
                <input type="text" id="message" name="message">
            </div>

            <div class="formCont">
                <label>Адрес получателя</label>
                <input type="text" id="address" name="address">
            </div>
            <?php endif; ?>
            <input type="hidden" name="type" value="<?= $type ?>">

            <button type="submit" id="authButton">Оформить заказ</button>

        </form>

    </section>

</main>

<?php include '../footer.php';?>

</body>
</html>