<?php
    session_start();

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header("Location: http://UPsite/index.php");
        exit;
    }

    include '../db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="admin.css">

    <title>Админ-панель</title>
</head>

<body>

<?php include '../header.php';?>

<main class="admin-wrapper">

    <h1 class="admin-title">Панель управления</h1>

    <div class="admin-grid">

        <?php
            $stmt = $pdo->query("SELECT DISTINCT users.username FROM orders JOIN users ON users.id = orders.user_id");
            $users = $stmt->fetchAll();
        ?>

        <?php
            $stmt = $pdo->query("
            SELECT
            orders.id,
            users.username,
            orders.status,
            orders.created_at,
            orders.message,
            orders.address,
            services.name AS service_name,
            services.type
            FROM orders
            JOIN users ON users.id = orders.user_id
            JOIN services ON services.id = orders.service_id
        ");
            $orders = $stmt->fetchAll();
        ?>

    <section class="admin-card">
        <h2>Заказы</h2>
        <?php foreach ($orders as $order): ?>
            <div class="admin-item">
                <span>👤 <?= $order['username'] ?></span>
                <span>📦 <?= $order['service_name'] ?></span>
                <small>
                <?= $order['status'] ?> | <?= $order['created_at'] ?>
                </small>

                <?php if($order['type'] === 'service' && $order['message']): ?>
                    <small>✉️ Сообщение: <?= $order['message'] ?></small>
                    <small>📍 Адрес: <?= $order['address'] ?></small>
                <?php endif; ?>
                
                <form method="post" class="apply-form">
                    <input type="hidden" name="order_apply_id" value="<?= $order['id'] ?>">
                    <button type="submit" class="order-applyer"></button>
                </form>

                <form method="post" action="deleteOrder.php" class="delete-form">
                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                    <button type="submit" class="item-deleter">✖</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>

    </div>

</main>

<?php include '../footer.php';?>

</body>
</html>